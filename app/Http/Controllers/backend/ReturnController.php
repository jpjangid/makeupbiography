<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\ReturnMail;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\OrderItemReturn;
use App\Models\ProductVariantMedia;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Exception;
use Illuminate\Support\Facades\Mail;

class ReturnController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $all_return_orders = OrderItemReturn::with('item.order', 'user', 'variant')->orderby('created_at', 'desc')->get();

            $return_orders = new Collection;
            foreach ($all_return_orders as $return_order) {
                $return_orders->push([
                    'id'                => $return_order->id,
                    'order_no'          => '#' . $return_order->item->order->order_no,
                    'sku'               => $return_order->variant->sku,
                    'return_no'         => $return_order->return_no,
                    'client'            => $return_order->user->name,
                    'reason'            => $return_order->reason,
                    'return_status'     => $return_order->status,
                    'date'              => date('d-m-Y h:i A', strtotime($return_order->created_at)),
                ]);
            }

            return Datatables::of($return_orders)
                ->addIndexColumn()
                ->addColumn('returnno', function ($row) {
                    $edit_url = url('admin/returns/return_detail', $row['id']);
                    $btn = '<a href="' . $edit_url . '">#' . $row['return_no'] . '</i></a>';
                    return $btn;
                })
                ->rawColumns(['returnno'])
                ->make(true);
        }
        return view('backend.returns.index');
    }

    public function return_detail($id)
    {
        $return_order = OrderItemReturn::where('id', $id)->with('item', 'order', 'user', 'variant')->first();
        $media = ProductVariantMedia::where(['product_variant_id' => $return_order->variant->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
        $image = $media->media != '' ? $media->media : '';
        $order_id = $return_order->order_id;
        $order = Order::where('id', $order_id)->with('items')->first();
        $total = 0.00;
        $itemtotal = 0.00;
        foreach ($order->items as $order_item) {
            if ($order_item->id == $return_order->order_item_id) {
                $itemtotal = $order_item->variant->sale_price * $order_item->quantity;
            }
        }

        if (!empty($order->coupon_id)) {
            $coupon = Coupon::find($order->coupon_id);
            $total = $this->coupon($coupon, $return_order);
        } else {
            $total = $itemtotal;
        }

        return view('backend.returns.detail', compact('return_order', 'image','total','order'));
    }

    public function update(Request $request)
    {
        $return_order = OrderItemReturn::find($request->id);
        $return_order->status = $request->status;
        $return_order->update();

        $update_order = OrderItem::where('id',$return_order->order_item_id)->with('variant.product')->first();
        $update_order->item_status = $return_order->status;
        $update_order->flag = '1';
        $update_order->update();

        $placed_order = Order::find($return_order->order_id);
        $user = User::find($placed_order->user_id);

        if ($request->status == 'Return Approved') {
            $response = $this->create_return_order_on_ship_rocket($return_order);
            if (!empty($response['$m_response']) && $response['$m_response']->status == 'RETURN PENDING') {
                $update_return_order = OrderItemReturn::find($request->id);
                $update_return_order->shiprocket_order_id = $response['$m_response']->order_id;
                $update_return_order->shiprocket_shipment_id = $response['$m_response']->shipment_id;
                $update_return_order->amount = $response['total'];
                $update_return_order->update();

                $order = Order::find($return_order->order_id);
                $order->total_amount = $order->total_amount - $response['total'];
                $order->no_items = $order->no_items - 1;
                $order->update();
            }

            $subject = 'YOUR RETURN REQUEST IS ACCEPTED!';
            $message = $user->name.' your return request has been approved & and the product will be picked within 10 business days. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if ($request->status == 'Refund Completed via Acc') {
            $order_id = $return_order->order_id;
            $order = Order::where('id', $order_id)->with('items')->first();
            $total = 0.00;
            $itemtotal = 0.00;
            foreach ($order->items as $order_item) {
                if ($order_item->id == $return_order->order_item_id) {
                    $itemtotal = $order_item->variant->sale_price * $order_item->quantity;
                }
            }
    
            if (!empty($order->coupon_id)) {
                $coupon = Coupon::find($order->coupon_id);
                $total = $this->coupon($coupon, $return_order);
            } else {
                $total = $itemtotal;
            }

            $order->total_amount = $order->total_amount - $response['total'];
            $order->no_items = $order->no_items - 1;
            $order->update();
            
            $subject = 'YOUR REFUND REQUEST IS ACCEPTED!';
            $message = $user->name.' your refund request is approved and refund completed via Account. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if ($request->status == 'Refund Completed via Voucher') {
            $order_id = $return_order->order_id;
            $order = Order::where('id', $order_id)->with('items')->first();
            $total = 0.00;
            $itemtotal = 0.00;
            foreach ($order->items as $order_item) {
                if ($order_item->id == $return_order->order_item_id) {
                    $itemtotal = $order_item->variant->sale_price * $order_item->quantity;
                }
            }
    
            if (!empty($order->coupon_id)) {
                $coupon = Coupon::find($order->coupon_id);
                $total = $this->coupon($coupon, $return_order);
            } else {
                $total = $itemtotal;
            }

            $order->total_amount = $order->total_amount - $response['total'];
            $order->no_items = $order->no_items - 1;
            $order->update();

            if($order->payment_status == 'success'){
                Wallet::create([
                    'user_id'       =>  $order->user_id,
                    'order_id'      =>  $order->id,
                    'amount'        =>  $total,
                    'remark'        =>  'Refund Amount',
                    'status'        =>  'credited',
                ]);
            }
            
            $subject = 'YOUR REFUND REQUEST IS ACCEPTED!';
            $message = $user->name.' your refund request is approved and refund completed via wallet money. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if($request->status == 'Exchange Initiated'){
            $subject = 'YOUR EXCHANGE IS INITIATED!';
            $message = $user->name.' your exchange initiated. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if($request->status == 'Exchange Approved'){
            $subject = 'YOUR EXCHANGE IS APPROVED!';
            $message = $user->name.' your exchange approved. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if($request->status == 'Exchange Completed'){
            $subject = 'YOUR EXCHANGE ORDER IS COMPLETED!';
            $message = $user->name.' your exchange completed. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if($request->status == 'Return/Exchange Rejected'){
            $subject = 'YOUR RETURN REQUEST IS NOT APPROVED!';
            $message = $user->name.' your Return/Exchange Rejected. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        if($request->status == 'Cancel Approved'){
            $subject = 'Cancel Request Approved!';
            $message = $user->name.' your Cancel Approved. Your order no. is #' . $placed_order->order_no . ' and you can find your purchase information below.';
        }

        $status = $request->status;
        $media = ProductVariantMedia::where(['product_variant_id' => $return_order->variant->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
        $image = $media->media != '' ? $media->media : '';

        Mail::to($placed_order->billing_email)
            ->cc(['lakhansharma.webanix@gmail.com','mohsinwebanix@gmail.com'])
            ->send(
                new ReturnMail(
                    $user->name,
                    $placed_order->order_no,
                    $message,
                    $placed_order,
                    $update_order,
                    $image,
                    $status,
                    $subject
                )
            );

        $data['message'] = 'Return Order Status Updated';
        return response()->json($data);
    }

    public function create_return_order_on_ship_rocket($return_order)
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
        //$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMyOTY4OSwiaXNzIjoiaHR0cHM6Ly9hcGl2Mi5zaGlwcm9ja2V0LmluL3YxL2V4dGVybmFsL2F1dGgvbG9naW4iLCJpYXQiOjE1Nzc0OTQzNzEsImV4cCI6MTU3ODM1ODM3MSwibmJmIjoxNTc3NDk0MzcxLCJqdGkiOiJrUGVNTmxhTnRFc3dodXBXIn0.M5KlLjOoZL-QrDmiSQ23jTCt0uDUAHYhZzP0vbQG8Qs';
        # Creating order params
        $order_id = $return_order->order_id;
        $order = Order::where('id', $order_id)->with('items')->first();

        $payment_mode = $order->payment_mode == 'cod' ? 'COD' : 'Prepaid';
        $items = new Collection();
        $total = 0.00;
        $itemtotal = 0.00;
        foreach ($order->items as $order_item) {
            if ($order_item->id == $return_order->order_item_id) {
                $itemtotal = $order_item->variant->sale_price * $order_item->quantity;
                $items->push([
                    'name'          => $order_item->variant->product->name . ' - ' . $order_item->variant->name,
                    'sku'           => $order_item->variant->sku,
                    'units'         => $order_item->quantity,
                    'selling_price' => $order_item->variant->sale_price,
                    'hsn'           => $order_item->variant->product->hsn
                ]);
            }
        }

        if (!empty($order->coupon_id)) {
            $coupon = Coupon::find($order->coupon_id);
            $total = $this->coupon($coupon, $return_order);
        } else {
            $total = $itemtotal;
        }
        $data['total'] = $total;

        $order_params = array(
            'headers' => ['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $token],
            'json' => array(
                'order_id' => $return_order->return_no,
                'order_date' => $order->created_at,
                'channel_id' => '2086016',
                'pickup_customer_name' => $order->shipping_name,
                "pickup_last_name" => $order->shipping_name,
                'pickup_address' => $order->shipping_address,
                'pickup_city' => $order->shipping_city,
                'pickup_pincode' => $order->shipping_zip,
                'pickup_state' => $order->shipping_state,
                'pickup_country' => $order->shipping_country,
                'pickup_email' => $order->shipping_email, # Customer email
                'pickup_phone' => $order->shipping_mobile,
                'pickup_location_id' => '1767511',
				'shipping_customer_name' => 'Naman',
				'shipping_last_name' => 'Naman',
				'shipping_address' => '#45, Sri Complex, Sajjan Rae circle, V.V. Puram',
				'shipping_address_2' => '#45, Sri Complex, Sajjan Rae circle, V.V. Puram',
				'shipping_city' => 'Bangalore',
				'shipping_pincode' => '560004',
				'shipping_country' => 'India',
				'shipping_state' => 'Karnataka',
				'shipping_email' => 'info@makeupbiography.com',
				'shipping_phone' => '9483480760',
                'order_items' => $items,
                'payment_method' => $payment_mode,
                /* 'sub_total' => $selling_price, --changed on 02/04/2021*/
                'sub_total' => $total,
                'length' => 1,
                'breadth' => 1,
                'height' => 1,
                'weight' => 1,
            ),
        );
        try {
            $response = $client->post('https://apiv2.shiprocket.in/v1/external/orders/create/return', $order_params);
            $data['$m_response'] = json_decode((string) $response->getBody());
            return $data;
            # Sending email to customer about approval
            // $this->send_refund_approved_email_to_customer($return_order['id']);
            // $this->send_refund_approved_sms_to_customer($return_order['id']);
        } catch (Exception $e) {
            $m_response = $e;
        }
        return $m_response;
    }

    public function coupon($coupon, $return_order)
    {
        $item = OrderItem::find($return_order->order_item_id);
        $product = Product::where('id', $return_order->product_id)->with('category.parent.parent')->first();
        $brand_id = !empty($product->brand_id) ? $product->brand_id : '';
        $main_cat_id = '';
        $cat_id = '';
        $sub_cat_id = '';

        if (isset($product->category->parent->parent->id)) {
            $main_cat_id = $product->category->parent->parent->id;
        }
        if (isset($product->category->parent->id)) {
            $cat_id = $product->category->parent->id;
        }
        if (isset($product->category->id)) {
            $sub_cat_id = $product->category->id;
        }

        if ($coupon->type == 'merchandise') {
            if (
                !empty($coupon->product_id) && !empty($product->id) && $coupon->product_id == $product->id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->sub_cat_id) && !empty($sub_cat_id) && $coupon->sub_cat_id == $sub_cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->cat_id) && !empty($sub_cat_id) && $coupon->cat_id == $sub_cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->main_cat_id) && !empty($sub_cat_id) && $coupon->main_cat_id == $sub_cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->cat_id) && !empty($cat_id) && $coupon->cat_id == $cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->main_cat_id) && !empty($cat_id) && $coupon->main_cat_id == $cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->main_cat_id) && !empty($main_cat_id) && $coupon->main_cat_id == $main_cat_id
            ) {
                return $this->disc_apply($item, $coupon);
            } elseif (
                !empty($coupon->brand_id) && !empty($brand_id) && $coupon->brand_id == $brand_id
            ) {
                return $this->disc_apply($item, $coupon);
            } else {
                $example_coupon = '';
                return $this->disc_apply($item, $example_coupon);
            }
        } else {
            return $this->disc_apply($item, $coupon);
        }
    }

    public function disc_apply($item, $coupon)
    {
        $disc = 0.00;
        $sale = 0.00;
        if (!empty($coupon)) {
            if ($coupon->disc_type == 'percent') {
                $disc = floatval((floatval($item->variant->sale_price) * $coupon->discount) / 100);
                $sale = (floatval($item->variant->sale_price) - floatval($disc)) * $item->quantity;
            }
            if ($coupon->disc_type == 'amount') {
                $disc = $coupon->discount;
                $sale = (floatval($item->variant->sale_price) - $coupon->discount) * $item->quantity;
            }
        } else {
            $sale = floatval($item->variant->sale_price) * $item->quantity;
        }

        return $sale;
    }
}
