<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItemReturn;
use App\Models\ProductMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.main.index');
    }

    public function dashboard(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $fromDateTime = strtotime($from);
        $toDateTime = strtotime($to);

        $datediff = $toDateTime - $fromDateTime;
        $difference = round($datediff / (60 * 60 * 24));

        $toTimeDiff = $difference + 1;
        $fromTimeDiff = $toTimeDiff + $difference;

        $prevTo = date('Y-m-d', strtotime('-' . $toTimeDiff . ' day'));
        $prevFrom = date('Y-m-d', strtotime('-' . $fromTimeDiff . ' day'));

        $currentData = $this->calculation($from, $to);
        $prevData = $this->calculation($prevFrom, $prevTo);

        //Current Date Calculation
        $data['current_total_revenue'] = $currentData['total_revenue'];
        $data['current_avg_revenue'] = $currentData['avg_revenue'];
        $data['current_new_users']  = $currentData['new_users'];
        $data['current_total_return_qty'] = $currentData['total_return_qty'];

        //Previous Date Calculation
        $data['prev_total_revenue'] = $prevData['total_revenue'];
        $data['prev_avg_revenue'] = $prevData['avg_revenue'];
        $data['prev_new_users']  = $prevData['new_users'];
        $data['prev_total_return_qty'] = $prevData['total_return_qty'];

        $data['orders_to_show'] = $currentData['orders_to_show'];
        $data['top_sold_products'] = $currentData['top_sold_products'];
        $data['sold_items_no'] = $currentData['sold_items_no'];
        $data['no_of_orders'] = $currentData['no_of_orders'];

        return response()->json($data);
    }

    public function calculation($from, $to)
    {
        $sold_items_no = 0;
        $total_revenue = 0;
        $no_of_orders = 0;
        $avg_revenue = 0;

        $orders_to_show = array();
        $show_data = array();
        $purchased_products = array();

        $orders = Order::where([['created_at', '>=', $from], ['created_at', '<=', $to]])->with('items', 'user')->get();
        foreach ($orders as $order) {
            $total_revenue += $order->total_amount;
            $no_of_orders += 1;
            $show_data['user']  = $order->user->name;
            $show_data['order_no']  =  '#' . $order->order_no;
            $show_data['amount']    =  $order->total_amount;
            $show_data['first_letter'] = substr($order->user->name, 0, 1);

            array_push($orders_to_show, $show_data);
            $products = array();

            foreach ($order->items as $item) {
                $sold_items_no += $item->quantity;
                $products['name'] = $item->product->item_shade_name;
                $products['qty'] = $item->quantity;
                $media = ProductMedia::where(['product_id' => $item->product->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
                $products['image'] = isset($media->media) ? $media->media : '';
                $products['brand'] = $item->product->brand->name;
                array_push($purchased_products, $products);
            }
        }

        $temps = array_unique(array_column($purchased_products, 'name'));
        $product = new Collection();
        $qty = 0;
        $image = '';
        $brand = '';
        foreach ($temps as $temp) {
            foreach ($purchased_products as $purchased) {
                if ($purchased['name'] == $temp) {
                    $qty += $purchased['qty'];
                    $image = $purchased['image'];
                    $brand = $purchased['brand'];
                }
            }
            $product->push([
                'name'      =>  $temp,
                'qty'       =>  $qty,
                'image'     =>  $image,
                'brand'     =>  $brand,
            ]);
            $qty = 0;
            $image = '';
            $brand = '';
        }

        if ($total_revenue != 0) {
            $avg_revenue = $total_revenue / $no_of_orders;
        }

        usort($orders_to_show, function ($a, $b) {
            return $b['amount'] <=> $a['amount'];
        });

        $returns = OrderItemReturn::where([['created_at', '>=', $from], ['created_at', '<=', $to]])->get();
        $total_return_qty = 0;
        foreach ($returns as $return) {
            $total_return_qty += $return->quantity;
        }

        $total_users = 0;
        $users = User::where([['created_at', '>=', $from], ['created_at', '<=', $to]])->get();
        $total_users = count($users);

        $data['total_revenue'] = '&#8377; ' . number_format((float)$total_revenue, 2, '.', '');
        $data['sold_items_no'] = $sold_items_no;
        $data['no_of_orders'] = $no_of_orders;
        $data['avg_revenue'] = '&#8377; ' . number_format((float)$avg_revenue, 2, '.', '');
        $data['orders_to_show'] = array_slice($orders_to_show, 0, 8);;
        $data['new_users']  = $total_users;
        $data['total_return_qty'] = $total_return_qty;
        $data['top_sold_products'] = $product;

        return $data;
    }
}
