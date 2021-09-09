<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        $user = auth()->user();

        $online_payment = "fail";

        $payment_mode = $request->payment_mode;
        // $payment_mode = "online";

        if ($payment_mode == "online" && $request->total != '') {

            $keyId = 'rzp_live_f7q120n58ysQwH';
            $keySecret = 'xHKdv1TyRYrGr81uAfCDlFC0';

            $success = true;
            $error = "Payment Failed";

            if (empty($request->razorpay_payment_id) === false) {
                $api = new Api($keyId, $keySecret);

                try {
                    // Please note that the razorpay order ID must
                    // come from a trusted source (session here, but
                    // could be database or something else)
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
                $razorpay_payment_id =$request->razorpay_payment_id;
                $razorpay_signature = $request->razorpay_signature;
                $online_payment = !empty($razorpay_payment_id) ? "success" : "pending";
            } else {
                return redirect('cart')->with('fail', 'Payment failed.');
            }
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
            $coupon = Coupon::where('code',$request->coupon_code)->first();
            $coupon_id = $coupon->id;
        }else{
            $order_amt = $request->total;
        }

        if($request->coupon_discount != 0){
            $discount = $request->coupon_discount + $request->product_discount;
        }else{
            $discount = $request->product_discount;
        }

        $order = Order::create([
            'order_no'                  => $request->razorpay_order_id,
            'user_id'                   => $user->id,
            'order_amount'              => $order_amt,
            'discount_applied'          => $discount,
            'service_charge_applied'    => $request->shipping_charge,
            'total_amount'              => $request->total,
            'no_items'                  => $request->,
            'billing_name'              => $request->billing_name,
            'billing_mobile'            => $request->billing_mobile,
            'billing_address'           => $request->billing_address,
            'billing_country'           => $request->billing_country,
            'billing_state'             => $request->billing_state,
            'billing_city'              => $request->billing_city,
            'billing_zip'               => $request->,
            'billing_landmark'          => $request->,
            'shipping_name'             => $request->,
            'shipping_mobile'           => $request->,
            'shipping_address'          => $request->,
            'shipping_country'          => $request->,
            'shipping_state'            => $request->,
            'shipping_city'             => $request->,
            'shipping_zip'              => $request->,
            'shipping_landmark'         => $request->,
            'order_status'              => $request->,
            'payment_gateway_id'        => $request->,
            'payment_mode'              => $request->,
            'payment_currency'          => $request->,
            'payment_status'            => $request->,
            'shiprocket_order_id'       => $request->,
            'shiprocket_shipment_id'    => $request->,
            'coupon_id'                 => $request->,
            'shop'                      => $request->,
            'order_comments'            => $request->,
            'payment_amount'            => $request->,
            'wallet_amount'             => $request->,
        ]);
    }
}
