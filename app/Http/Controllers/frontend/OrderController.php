<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsedBy;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->with('product', 'productVariant.medias')->get();

        $online_payment = "fail";

        $payment_mode = $request->payment_mode;
        // $payment_mode = "online";

        if ($payment_mode == "online" && $request->total != 0) {

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
                $razorpay_order_id = $$request->razorpay_order_id;
                $razorpay_payment_id = $request->razorpay_payment_id;
                $razorpay_signature = $request->razorpay_signature;
                $online_payment = !empty($razorpay_payment_id) ? "success" : "pending";
            } else {
                return redirect('cart')->with('fail', 'Payment failed.');
            }
        }elseif($payment_mode == "cod"){
            $razorpay_payment_id = '';
            $razorpay_order_id = '';
            $online_payment = "pending";
        }else{
            $payment_mode == "wallet";
            $razorpay_payment_id = '';
            $razorpay_order_id = '';
            $online_payment = "success";
        }

        $address = UserAddress::find($request->addressSelect);
        if (empty($address)) {
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
        if($request->wallet_amt != 0){
            if(!empty($request->total)){
                $order_amt = $request->wallet_amt + $request->total;
            }else{
                $order_amt = $request->wallet_amt;
            }
        }else{
            $order_amt = $request->total;
        }

        $coupon = '';
        if($request->coupon_discount != 0){
            $discount = $request->coupon_discount + $request->product_discount;
            $coupon = Coupon::where('code',$request->coupon_code)->first();
            $coupon_id = $coupon->id;
        }else{
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
            'payment_mode'              => $request->$payment_mode,
            'payment_currency'          => 'INR',
            'payment_status'            => $online_payment,
            'coupon_id'                 => $coupon_id,
            'coupon_discount'           => $request->coupon_discount,
            'order_comments'            => $request->order_comments,
            'payment_amount'            => $request->total,
            'wallet_amount'             => $request->wallet_amt,
        ]);

        foreach($cartItems as $item){
            OrderItem::create([
                'order_id'              =>  $order->id,
                'product_id'            =>  $item->product_id,
                'product_variant_id'    =>  $item->product_variant_id,
                'quantity'              =>  $item->quantity,
            ]);
        }

        if(!empty($coupon) && $request->coupon_discount != 0){
            if($coupon->type == 'merchandise' || $coupon->type == 'global' || $coupon->type == 'personal_code' || $coupon->type == 'cart_value_discount' ){
                CouponUsedBy::create([
                    'coupon_id'         =>  $coupon->id,
                    'user_id'           =>  $user->id,
                    'order_id'          =>  $order->id,
                    'amount'            =>  $request->coupon_discount,
                    'applied_times'     =>  1,
                ]);
            }else{
                $coupon->times_applied  = $coupon->times_applied + 1;
                $coupon->update();
            }
        }

        if($request->wallet_amt != 0){
            Wallet::create([
                'user_id'           =>  $user->id,
                'order_id'          =>  $order->id,
                'amount'            =>  $request->wallet_amt,
                'status'            =>  'debited',
            ]);
        }

        if(!empty($order)){
            foreach($cartItems as $item){
                $item->delete();
            }
        }

        return redirect('/')->with('success','Order Placed Successfully');
    }

    public function order_no()
    {
        $no = Str::random(8);
        $order = Order::where('order_no',$no)->first();
        if(!empty($order)){
            $this->order_no();
        }else{
            return $no;
        }
    }
}
