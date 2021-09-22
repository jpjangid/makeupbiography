<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\OrderItemReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Notification;

class ReturnController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->return_check) && !empty($request->return_check)){
            $user = auth()->user();
            $reason = new Collection();
            foreach($request->status as $key => $status){
                if(!empty($status)){
                    $reason->push([
                        'status'        =>  $status,
                        'description'   =>  $request->description[$key],
                    ]);
                }
            }
            foreach($request->return_check as $key => $return_check){
                $item = OrderItem::find($return_check);
                $item->item_status = 'Return';
                $item->update();

                $return_no = $this->order_no();
                OrderItemReturn::create([
                    'return_no'             =>  $return_no,
                    'user_id'               =>  $user->id,
                    'order_id'              =>  $request->order_id,
                    'order_item_id'         =>  $return_check,
                    'product_id'            =>  $item->product_id,
                    'product_variant_id'    =>  $item->product_variant_id,
                    'quantity'              =>  $item->quantity,
                    'reason'                =>  $reason[$key]['status'],
                    'description'           =>  $reason[$key]['description'],
                    'status'                =>  'Pending',
                ]);
            }
            Notification::create(['title' => "Order Return",'message' => 'Order returned with order no :'.$request->order_id.' from '.auth()->user()->email]);
           
            return redirect('my-orders')->with('success','Product is Returned');
        }
        return redirect()->back()->with('danger','Please Select Product To Return');
    }

    public function order_no()
    {
        $no = Str::random(8);
        $order = OrderItemReturn::where('return_no', $no)->first();
        if (!empty($order)) {
            return $this->order_no();
        } else {
            return $no;
        }
    }
}
