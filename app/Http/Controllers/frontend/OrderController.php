<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderPlaced;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsedBy;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductMedia;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->join('products', 'products.id', '=', 'carts.product_id')->select('carts.*', 'products.id as product_id', 'products.sale_price as sale_price', 'products.discount as discount', 'products.regular_price as regular_price', 'discount_details.discount_type as p_discount_type', 'discount_details.discount as p_discount')->leftjoin('discount_details', 'products.id', '=', 'discount_details.product_id')->get();
        // dd($cartItems);

        $online_payment = "fail";

        $payment_mode = $request->payment_method;
        // $payment_mode = "online";

        if ($payment_mode == "online" && !empty($request->razorpay_order_id)) {

            $keyId = 'rzp_live_f7q120n58ysQwH';
            $keySecret = 'xHKdv1TyRYrGr81uAfCDlFC0';

            $success = true;
            $error = "Payment Failed";

            if (empty($request->razorpay_payment_id) === false) {
                $api = new Api($keyId, $keySecret);

                try {
                    $attributes = array(
                        'razorpay_order_id' => $request->razorpay_order_id,
                        'razorpay_payment_id' => $request->razorpay_payment_id,
                        'razorpay_signature' => $request->razorpay_signature,
                    );

                    $api->utility->verifyPaymentSignature($attributes);
                } catch (SignatureVerificationError $e) {
                    $success = false;
                    $error = 'Razorpay Error : ' . $e->getMessage();
                }
            }

            if ($success === true) {
                $razorpay_order_id = $request->razorpay_order_id;
                $razorpay_payment_id = $request->razorpay_payment_id;
                $razorpay_signature = $request->razorpay_signature;
                $online_payment = !empty($razorpay_payment_id) ? "success" : "pending";
            } else {
                return redirect('cart')->with('fail', 'Payment failed.');
            }
        }

        if ($payment_mode == "cod") {
            $razorpay_payment_id = '';
            $razorpay_order_id = '';
            $online_payment = "pending";
        }

        if ($request->wallet_amt != 0 && empty($request->razorpay_order_id)) {
            $payment_mode == "online";
            $razorpay_payment_id = '';
            $razorpay_order_id = '';
            $online_payment = "success";
        }

        if ($request->addressSelect == 'new') {
            $UserAddress = new UserAddress;
            $UserAddress->user_id   = $user->id;
            $UserAddress->name      = $request->billing_name;
            $UserAddress->mobile    = $request->billing_mobile;
            $UserAddress->address   = $request->billing_address;
            $UserAddress->pincode   = $request->billing_postcode;
            $UserAddress->landmark  = $request->billing_landmark;
            $UserAddress->state     = $request->billing_state;
            $UserAddress->city      = $request->billing_city;
            $UserAddress->save();

            $UserAddress = new UserAddress;
            $UserAddress->user_id   = $user->id;
            $UserAddress->name      = $request->shipping_name;
            $UserAddress->mobile    = $request->shipping_mobile;
            $UserAddress->address   = $request->shipping_address;
            $UserAddress->pincode   = $request->shipping_postcode;
            $UserAddress->landmark  = $request->shipping_landmark;
            $UserAddress->state     = $request->shipping_state;
            $UserAddress->city      = $request->shipping_city;
            $UserAddress->save();
        }

        $order_amt = 0.00;
        $coupon_id = '';
        $discount = 0.00;
        if ($request->wallet_amt != 0) {
            if (!empty($request->total)) {
                $order_amt = $request->wallet_amt + $request->total;
            } else {
                $order_amt = $request->wallet_amt;
            }
        } else {
            $order_amt = $request->total;
        }

        $coupon = '';
        if ($request->coupon_discount != 0) {
            $discount = $request->coupon_discount + $request->product_discount;
            $coupon = DB::table('coupons')->where('code', $request->coupon_code)->first();
            $coupon_id = $coupon->id;
        } else {
            $discount = $request->product_discount;
        }

        $orderNumber = $this->order_no();

        $order = Order::create([
            'order_no'                  => $orderNumber,
            'user_id'                   => $user->id,
            'order_amount'              => $request->subtotal,
            'discount_applied'          => $discount,
            'service_charge_applied'    => $request->shipping_charge,
            'total_amount'              => $order_amt,
            'no_items'                  => $request->no_items,
            'billing_name'              => $request->billing_name,
            'billing_mobile'            => $request->billing_mobile,
            'billing_email'             => $request->billing_email,
            'billing_address'           => $request->billing_address,
            'billing_country'           => $request->billing_country,
            'billing_state'             => $request->billing_state,
            'billing_city'              => $request->billing_city,
            'billing_zip'               => $request->billing_postcode,
            'billing_landmark'          => $request->billing_landmark,
            'shipping_name'             => $request->shipping_name,
            'shipping_mobile'           => $request->shipping_mobile,
            'shipping_email'            => $request->shipping_email,
            'shipping_address'          => $request->shipping_address,
            'shipping_country'          => $request->shipping_country,
            'shipping_state'            => $request->shipping_state,
            'shipping_city'             => $request->shipping_city,
            'shipping_zip'              => $request->shipping_postcode,
            'shipping_landmark'         => $request->shipping_landmark,
            'order_status'              => $online_payment,
            'razorpay_order_id'         => $razorpay_order_id,
            'razorpay_payment_id'       => $razorpay_payment_id,
            'payment_mode'              => $payment_mode,
            'payment_currency'          => 'INR',
            'payment_status'            => $online_payment,
            'coupon_id'                 => $coupon_id,
            'coupon_discount'           => $request->coupon_discount,
            'order_comments'            => $request->order_comments,
            'payment_amount'            => $request->total,
            'wallet_amount'             => $request->wallet_amt,
            'gst_no'                    => $request->gst_no,
        ]);

        foreach ($cartItems as $item) {
            $discount = $item->regular_price * $item->p_discount / 100;
            $discount_price = $item->regular_price - $discount;
            if (!empty($item->p_discount)) {
                OrderItem::create([
                    'order_id'              =>  $order->id,
                    'product_id'            =>  $item->product_id,
                    'quantity'              =>  $item->quantity,
                    'sale_price'            =>  $discount_price,
                ]);
            } else {
                OrderItem::create([
                    'order_id'              =>  $order->id,
                    'product_id'            =>  $item->product_id,
                    'quantity'              =>  $item->quantity,
                    'sale_price'            =>  $item->sale_price,
                ]);
            }
        }

        // if ($order->payment_mode == 'online') {
        $response = $this->create_shiprocket_order($order->id);
        if (!empty($response) && $response->status == 'NEW') {
            $update_order = Order::find($order->id);
            $update_order->shiprocket_order_id = $response->order_id;
            $update_order->shiprocket_shipment_id = $response->shipment_id;
            $update_order->update();
        }


        // if (!empty($coupon) && $request->coupon_discount != 0) {
        //     if ($coupon->type == 'merchandise' || $coupon->type == 'global' || $coupon->type == 'personal_code' || $coupon->type == 'cart_value_discount') {
        //         CouponUsedBy::create([
        //             'coupon_id'         =>  $coupon->id,
        //             'user_id'           =>  $user->id,
        //             'order_id'          =>  $order->id,
        //             'amount'            =>  $request->coupon_discount,
        //             'applied_times'     =>  1,
        //         ]);

        //         $couponUsed = CouponUsedBy::where('coupon_id', $coupon->id)->get();

        //         if (
        //             $coupon->coupon_limit == count($couponUsed)
        //         ) {
        //             $coupon->status = 1;
        //             $coupon->update();
        //         }
        //     } else {
        //         $coupon->times_applied  = $coupon->times_applied + 1;
        //         if (
        //             $coupon->coupon_limit == $coupon->times_applied + 1
        //         ) {
        //             $coupon->status = 1;
        //         }
        //         $coupon->update();
        //     }
        // }

        if ($request->wallet_amt != 0) {
            Wallet::create([
                'user_id'           =>  $user->id,
                'order_id'          =>  $order->id,
                'amount'            =>  $request->wallet_amt,
                'status'            =>  'debited',
            ]);
        }

        if (!empty($order)) {
            foreach ($cartItems as $item) {
                $item->delete();
            }

            $recent_order = Order::where('id', $order->id)->with('items.product.medias', 'user')->first();
            $user = DB::table('users')->find($recent_order->user_id);
            $image = array();
            foreach ($recent_order->items as $item) {
                $media = DB::table('product_media')->where(['product_id' => $item->product->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
                if (!empty($media)) {
                    array_push($image, $media->media);
                }
            }
            $status = 'ORDER PLACED!!';
            Mail::to($recent_order->billing_email)
                ->cc(['lakhansharma.webanix@gmail.com', 'mohsinwebanix@gmail.com'])
                ->send(
                    new OrderPlaced(
                        $user->name,
                        $recent_order->order_no,
                        $user->name . ' your order has been placed successfully. Your order no. is #' . $recent_order->order_no . ' and you can find your purchase information below.',
                        $recent_order,
                        $image,
                        $status
                    )
                );

            sendSms($recent_order->billing_mobile, "Thank you for placing an order with us. We will be processing it soon. For any assistance plz mail us at enquiry@vaibhavstores.in. Thank you, Vaibhav Stores. PH: +9180 41518183");
        }
        Notification::create(['title' => "New Order", 'message' => 'New Order has beeen placed by ' . auth()->user()->email . ' with order no: ' . $order->order_no]);
        return redirect('orders/thanks/' . $order->order_no);
    }

    public function thankyou_page($order_no)
    {
        $order = Order::where('order_no', $order_no)->with('items.product.medias', 'user')->first();
        $user_id = $order->user_id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/users/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                    "userId": "' . $user_id . '",
                    "phoneNumber": "' . $order->user->mobile . '",
                    "countryCode": "+91",
                    "traits": {
                        "name": "' . $order->user->name . '",
                        "email": "' . $order->user->email . '"
                    },
                    "tags": ["sample-tag-1", "sample-tag-2"]
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic <SkJwX2NMSmlUU3M2cGh5cjJFWHptVjYtN1ZmOHlfaG5lMGNtaVNHckQxdzo=>'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        return view('frontend.order.ordersuccess', compact('order'));
    }

    public function order_no()
    {
        $no = strtoupper(Str::random(8));
        $order = DB::table('orders')->where('order_no', $no)->first();
        if (!empty($order)) {
            return $this->order_no();
        } else {
            return $no;
        }
    }

    public function create_shiprocket_order($order_id)
    {
        $m_response = array();
        $client = new Client();
        $params = array(
            'form_params' => array('email' => 'ved@webanix.in', 'password' => 'Admin@@123#')
        );



        $response = $client->post('https://apiv2.shiprocket.in/v1/external/auth/login', $params);
        $auth_response = json_decode((string) $response->getBody());
        # Shiprocket auth token
        $token = $auth_response->token;
        # Creating order params
        $order = Order::where('id', $order_id)->with('items.product')->first();
        dd($order);
        $payment_mode = $order->payment_mode == 'cod' ? 'COD' : 'Prepaid';
        $items = new Collection();
        dd($order->items);
        foreach ($order->items as $order_item) {
            $items->push([
                'name'              => $order_item->product->item_shade_name,
                'sku'               => $order_item->product->sku,
                'units'             => $order_item->quantity,
                'selling_price'     => $order_item->product->sale_price,
                'hsn'               => $order_item->product->hsn
            ]);
        }
        $order_params = array(
            'headers' => ['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $token],
            'json' => array(
                "order_id" => $order->order_no,
                "order_date" => $order->created_at,
                "pickup_location" => "Makeup Biography",
                "billing_customer_name" => $order->billing_name,
                "billing_last_name" => $order->billing_name,
                "billing_address" => $order->billing_address,
                "billing_address_2" => $order->billing_address,
                "billing_city" => $order->billing_city,
                "billing_pincode" => $order->billing_zip,
                "billing_state" => $order->billing_state,
                "billing_country" => $order->billing_country,
                "billing_email" => $order->billing_email,
                "billing_phone" => $order->billing_mobile,
                "shipping_is_billing" => false,
                "shipping_customer_name" => $order->shipping_name,
                "shipping_last_name" => $order->shipping_name,
                "shipping_address" => $order->shipping_address,
                "shipping_address_2" => $order->shipping_address,
                "shipping_city" => $order->shipping_city,
                "shipping_pincode" => $order->shipping_zip,
                "shipping_state" => $order->shipping_state,
                "shipping_country" => $order->shipping_country,
                "shipping_email" => $order->shipping_email,
                "shipping_phone" => $order->shipping_mobile,
                "order_items" => $items,
                "payment_method" => $payment_mode,
                "shipping_charges" => '',
                "sub_total" => $order->total_amount,
                "length" => 1,
                "breadth" => 1,
                "height" => 1,
                "weight" => 1
            ),
        );
        try {
            $response = $client->post('https://apiv2.shiprocket.in/v1/external/orders/create/adhoc', $order_params);
            $m_response = json_decode((string) $response->getBody());
            return $m_response;
        } catch (Exception $e) {
            $m_response = $e;
        }
        return $m_response;
    }
}
