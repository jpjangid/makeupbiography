<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
                        'razorpay_signature' => $request->razorpay_signature
                    );

                    $api->utility->verifyPaymentSignature($attributes);
                } catch (SignatureVerificationError $e) {
                    $success = false;
                    $error = 'Razorpay Error : ' . $e->getMessage();
                }
            }

            if ($success === true) {
                $razorpay_order_id = $request->session()->get('razorpay_order_id');
                $razorpay_payment_id = $_POST['razorpay_payment_id'];
                $razorpay_signature = $_POST['razorpay_signature'];
                $online_payment = !empty($razorpay_payment_id) ? "success" : "pending";
            } else {
                return redirect('cart')->with('fail', 'Payment failed.');
            }
        }

        // $order = Order::create([
        //     'order_no'                  => $request->razorpay_order_id,
        //     'user_id'                   => $request->,
        //     'order_amount'              => $request->,
        //     'discount_applied'          => $request->,
        //     'service_charge_applied'    => $request->,
        //     'total_amount'              => $request->,
        //     'no_items'                  => $request->,
        //     'billing_name'              => $request->,
        //     'billing_mobile'            => $request->,
        //     'billing_address'           => $request->,
        //     'billing_country'           => $request->,
        //     'billing_state'             => $request->,
        //     'billing_city'              => $request->,
        //     'billing_zip'               => $request->,
        //     'billing_landmark'          => $request->,
        //     'shipping_name'             => $request->,
        //     'shipping_mobile'           => $request->,
        //     'shipping_address'          => $request->,
        //     'shipping_country'          => $request->,
        //     'shipping_state'            => $request->,
        //     'shipping_city'             => $request->,
        //     'shipping_zip'              => $request->,
        //     'shipping_landmark'         => $request->,
        //     'order_status'              => $request->,
        //     'payment_gateway_id'        => $request->,
        //     'payment_mode'              => $request->,
        //     'payment_currency'          => $request->,
        //     'payment_status'            => $request->,
        //     'shiprocket_order_id'       => $request->,
        //     'shiprocket_shipment_id'    => $request->,
        //     'coupon_id'                 => $request->,
        //     'shop'                      => $request->,
        //     'order_comments'            => $request->,
        //     'payment_amount'            => $request->,
        //     'wallet_amount'             => $request->,
        // ]);
    }
}
