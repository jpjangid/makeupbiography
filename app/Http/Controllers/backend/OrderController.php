<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;
use App\Models\ProductVariantMedia;

class OrderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allorders = Order::with('items','user')->orderby('created_at','desc')->get();

            $orders = new Collection;
            foreach ($allorders as $order) {
                $orders->push([
                    'id'    => $order->id,
                    'order_no'  => $order->order_no,
                    'client'  => $order->user->name,
                    'order_status' => $order->order_status,
                    'payment_status' => $order->payment_status,
                    'total' => number_format((float)$order->total_amount, 2, '.', ''),
                    'date'  => date('d-m-Y h:i A', strtotime($order->created_at)),
                    'order_comments' => $order->order_comments
                ]);
            }

            return Datatables::of($orders)
                ->addIndexColumn()
                ->addColumn('orderno', function ($row) {
                    $edit_url = url('admin/orders/order_detail', $row['id']);
                    $btn = '<a href="' . $edit_url . '">#'.$row['order_no'].'</i></a>';
                    return $btn;
                })
                ->rawColumns(['orderno'])
                ->make(true);
        }
        return view('backend.orders.index');
    }

    public function order_detail($id)
    {
        $order = Order::where('id',$id)->with('items.variant.product','items.variant.medias','user')->first();
        $image = array();
        foreach($order->items as $item){
            $media = ProductVariantMedia::where(['product_variant_id' => $item->variant->id, 'media_type' => 'image'])->orderby('sequence','asc')->first();
            if(!empty($media)){
                array_push($image, $media->media);
            }
        }

        return view('backend.orders.detail', compact('order','image'));
    }

    public function update(Request $request)
    {
        if($request->order_status == 'success'){
            $response = $this->create_shiprocket_order($request->id);
            if (!empty($response) && $response->status == 'NEW') {
                $update_order = Order::find($request->id);
                $update_order->shiprocket_order_id = $response->order_id;
                $update_order->shiprocket_shipment_id = $response->shipment_id;
                $update_order->order_status = $request->order_status;
                $update_order->payment_status = $request->order_status;
                $update_order->update();
            }
        }else{
            $update_order = Order::find($request->id);
            $update_order->order_status = $request->order_status;
            $update_order->payment_status = $request->order_status;
            $update_order->update();
        }
        
        $data['message'] = 'Order Status Updated';
        return response()->json($data);
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
        $order = Order::where('id', $order_id)->with('items')->first();
        $payment_mode = $order->payment_mode == 'cod' ? 'COD' : 'Prepaid';
        $items = new Collection();
        foreach ($order->items as $order_item) {
            $items->push([
                'name'          => $order_item->variant->product->name . ' - ' . $order_item->variant->name,
                'sku'           => $order_item->variant->sku,
                'units'         => $order_item->quantity,
                'selling_price' => $order_item->variant->sale_price,
                'hsn'           => $order_item->variant->product->hsn
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
