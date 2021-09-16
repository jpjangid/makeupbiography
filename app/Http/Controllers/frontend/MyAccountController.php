<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderItemReturn;
use App\Models\User;
use App\Models\ProductVariantMedia;

class MyAccountController extends Controller
{
    //view for my-account
    public function myaccount()
    {
        if(auth()->user()->role == 'admin') {
            return redirect('admin/profile');
        }
        return view('frontend.myaccount.myaccount');
    }

    //view for my-wallet
    public function mywallet()
    {
        return view('frontend.myaccount.mywallet');
    }

    //view for myorders
    public function myorders()
    {
        $user = auth()->user();
        $orders = Order::where([['user_id',$user->id],['no_items','>','0']])->with('items.variant.product','user')->orderby('id','desc')->get();

        return view('frontend.myaccount.myorders', compact('orders'));
    }

    public function order_detail($order_no)
    {
        $order = Order::where('order_no',$order_no)->with('items.variant.product','items.variant.medias','user')->first();
        $image = array();
        foreach($order->items as $item){
            $media = ProductVariantMedia::where(['product_variant_id' => $item->variant->id, 'media_type' => 'image'])->orderby('sequence','asc')->first();
            if(!empty($media)){
                array_push($image, $media->media);
            }
        }

        return view('frontend.myaccount.order_detail', compact('order','image'));
    }

    public function return_orders()
    {
        $user = auth()->user();
        $return_orders = OrderItemReturn::where('user_id',$user->id)->with('item','order')->get();

        return view('frontend.myaccount.return_orders', compact('return_orders'));
    }

    //view for wishlist
    public function wishlist()
    {
        return view('frontend.wishlist.empty');
    }

    //view for question answers
    public function question_answers()
    {
        return view('frontend.myaccount.question_answer');
    }

    //view for my address
    public function myaddress()
    {
        $user_addresses = UserAddress::where('flag',0)->with('location')->get();
        return view('frontend.address.address',compact('user_addresses'));
    }

    //view for create my address
    public function myAddressViewCreate(Request $request)
    {
        //getting location for ajax request
        if(request()->ajax()) {
            $data['location'] = "";
            if(!empty($request->pincode) && Location::where('zip',$request->pincode)->first()) {
                $data['location'] = Location::where('zip',$request->pincode)->first();
            }
            return response()->json($data);
        }

        return view('frontend.address.create');
    }

    //store new address for user
    public function myAddressStore(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'mobile_no'    => 'required|numeric|digits:10',
            'address'      => 'required',
            'landmark'     => 'nullable', 
            'postcode'     => 'required|numeric', 
            'state'        => 'required',
            'city'         => 'required',
        ],[
            'name.required'         => 'Name is required',
            'email.required'        => 'Email is required',
            'mobile_no.required'    => 'Mobile No is required',
            'address.required'      => 'Address is required',
            'postcode.required'     => 'Postcode is required',
            'state.required'        => 'State is required',
            'city.required'        => 'City is required',
            'mobile_no.numeric'     => 'Mobile No must be numeric',
            'mobile_no.digits'      => 'Mobile No must be of 10 digits',
            'postcode.numeric'      => 'Postcode Must be numeric'
        ]);

        $state = "";
        $city = "";
        if(!empty($request->postcode)) {
            $location = Location::where('zip',$request->postcode)->first();
            if(!empty($location)) {
                $state = $location->state;
                $city = $location->city;
            } else {
                Location::create(['city' => strtoupper($request->city),'state' => strtoupper($request->city),'zip' => $request->postcode]);
                $state = strtoupper($request->state);
                $city = strtoupper($request->city);
            }
        }

        $address = new UserAddress;
        $address->user_id = auth()->user()->id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->mobile = $request->mobile_no; 
        $address->address = $request->address; 
        $address->landmark = $request->landmark; 
        $address->pincode = $request->postcode; 
        $address->city = $city;
        $address->state = $state;
        $address->save();
        
        return redirect('my-address')->with('success','New Address Created Successfully');
    }

    //edit view for address
    public function myAddressEdit($id)
    {
        if(empty($id)) {
            return redirect()->back();
        }
        $address = UserAddress::findOrFail($id);
        if($address->user_id != auth()->user()->id) {
            return redirect()->back();
        };
        return view('frontend.address.edit',compact('address'));
    }  
    
    //update new address for user
    public function myAddressUpdate(Request $request,$id)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'mobile_no'    => 'required|numeric|digits:10',
            'address'      => 'required',
            'landmark'     => 'nullable', 
            'postcode'     => 'required|numeric',
            'state'        => 'required',
            'city'         => 'required', 
        ],[
            'name.required'         => 'Name is required',
            'email.required'        => 'Email is required',
            'mobile_no.required'    => 'Mobile No is required',
            'address.required'      => 'Address is required',
            'postcode.required'     => 'Postcode is required',
            'state.required'        => 'State is required',
            'city.required'        => 'City is required',
            'mobile_no.numeric'     => 'Mobile No must be numeric',
            'mobile_no.digits'      => 'Mobile No must be of 10 digits',
            'postcode.numeric'      => 'Postcode Must be numeric'
        ]);

        $state = "";
        $city = "";
        if(!empty($request->postcode)) {
            $location = Location::where('zip',$request->postcode)->first();
            if(!empty($location)) {
                $state = $location->state;
                $city = $location->city;
            } else {
                Location::create(['city' => strtoupper($request->city),'state' => strtoupper($request->city),'zip' => $request->postcode]);
                $state = strtoupper($request->state);
                $city = strtoupper($request->city);
            }
        }

        $address = UserAddress::where('id',$id)->first();
        $address->name = $request->name;
        $address->email = $request->email;
        $address->mobile = $request->mobile_no; 
        $address->address = $request->address; 
        $address->landmark = $request->landmark; 
        $address->pincode = $request->postcode; 
        $address->city = $city;
        $address->state = $state;
        $address->update();
        
        return redirect('my-address')->with('success','Address updated Successfully');
    }

    //get address from db 
    public function getMyAddress(Request $request)
    {
        $location = UserAddress::find($request->location_id);
        return response()->json(['status' => 200,'data' => $location]);
    }

}
