<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

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
                    'date'  => date('d-m-Y H:i', strtotime($order->created_at)),
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
        $order = Order::where('id',$id)->with('items.variant.product','user')->first();

        return view('backend.orders.detail', compact('order'));
    }
}
