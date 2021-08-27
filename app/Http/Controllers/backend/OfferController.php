<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('flag','0')->get();

        return view('backend.offers.index', compact('offers'));
    }

    public function create()
    {
        $users = User::where('role','user')->get();
        $categories = Category::where('flag','0')->get();

        return view('backend.offers.create', compact('users','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'offer_name'                =>  'required',
            'coupan_code'               =>  'required|unique:offers',
            'select_scope'              =>  'required',
            'min_order_amount'          =>  'required',
            'max_order_amount'          =>  'required',
            'type'                      =>  'required',
            'start_datetime'            =>  'required',
            'end_datetime'              =>  'required',
            'coupan_limit'              =>  'required',
        ],[
            'offer_name.required'           =>  'Please enter Offer Name',
            'coupan_code.required'          =>  'Please enter Coupan Code',
            'select_scope.required'         =>  'Please Select Linked To',
            'min_order_amount.required'     =>  'Please enter Min Order Amount',
            'max_order_amount.required'     =>  'Please enter Max Order Amount',
            'type.required'                 =>  'Please select Type',
            'start_datetime.required'       =>  'Please enter Start DateTime',
            'end_datetime.required'         =>  'Please enter End DateTime',
            'coupan_limit.required'         =>  'Please enter Coupan Limit',
        ]);

        $days = "";
        if(isset($request->week_days)){
            $files = $request->week_days;
            if(!empty($files)) {
                $weekdays = array();
                $days = array();
                    foreach($files as $file){
                        $image_name = $file;
                        array_push($weekdays,$image_name);
                    }
                $days = implode(",",$weekdays);
            }
        }

        Offer::create([
            'offer_name'            => $request->offer_name,
            'coupan_code'           => $request->coupan_code,
            'select_scope'          => $request->select_scope,
            'category_id'           => $request->category_id,
            'min_order_amount'      => $request->min_order_amount,
            'max_order_amount'      => $request->max_order_amount,
            'type'                  => $request->type,
            'user_id'               => $request->user_id,
            'start_datetime'        => $request->start_date,
            'end_datetime'          => $request->end_date,
            'week_days'             => $days,
            'coupan_limit'          => $request->coupan_limit,
            'discount'              => $request->discount,
            'discount_in_amount'    => $request->discount_in_amount,
        ]);

        return redirect('admin/offer')->with('success','Offer Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
