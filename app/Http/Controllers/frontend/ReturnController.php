<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\OrderItemReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReturnController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'status'        =>  'required',
            'description'   =>  'required',
        ],[
            'status.required'           =>  'Please Select Return Reason',
            'description.required'      =>  'Please Tell Us Why ?',
        ]);

        if(!empty($request->return_check)){
            $user = auth()->user();
            foreach($request->return_check as $return_check){
                $item = OrderItem::find($return_check);
                $item->item_status = 'return';
                $item->update();

                $refund_no = $this->order_no();
                OrderItemReturn::create([
                    'refund_no'             =>  $refund_no,
                    'user_id'               =>  $user->id,
                    'order_id'              =>  $request->order_id,
                    'order_item_id'         =>  $return_check,
                    'product_id'            =>  $item->product_id,
                    'product_variant_id'    =>  $item->product_variant_id,
                    'quantity'              =>  $item->quantity,
                    'reason'                =>  $request->status,
                    'description'           =>  $request->description,
                    'status'                =>  'Pending',
                ]);
            }
        }

        return redirect('my-orders')->with('success','Product is Returned');
    }

    public function order_no()
    {
        $no = Str::random(8);
        $order = OrderItemReturn::where('refund_no', $no)->first();
        if (!empty($order)) {
            return $this->order_no();
        } else {
            return $no;
        }
    }
}
