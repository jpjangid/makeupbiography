<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItemReturn;
use App\Models\ProductVariantMedia;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;


class ReturnController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $all_return_orders = OrderItemReturn::with('item.order','user','variant')->orderby('created_at','desc')->get();

            $return_orders = new Collection;
            foreach ($all_return_orders as $return_order) {
                $return_orders->push([
                    'id'                => $return_order->id,
                    'order_no'          => '#'.$return_order->item->order->order_no,
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
                    $btn = '<a href="' . $edit_url . '">#'.$row['return_no'].'</i></a>';
                    return $btn;
                })
                ->rawColumns(['returnno'])
                ->make(true);
        }
        return view('backend.returns.index');
    }

    public function return_detail($id)
    {
        $return_order = OrderItemReturn::where('id',$id)->with('item','order','user','variant')->first();
        $media = ProductVariantMedia::where(['product_variant_id' => $return_order->variant->id, 'media_type' => 'image'])->orderby('sequence','asc')->first();
        $image = $media->media != '' ? $media->media : '';

        return view('backend.returns.detail', compact('return_order','image'));
    }

    public function update(Request $request)
    {
        $return_order = OrderItemReturn::find($request->id);
        $return_order->status = $request->status;
        $return_order->update();

        $data['message'] = 'Return Order Status Updated';
        return response()->json($data);
    }
}
