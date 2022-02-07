<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'mobile'    =>  'required|numeric|digits:10',
            'message'   =>  'required',
        ], [
            'name.required'     =>  'Please Enter Name',
            'email.required'    =>  'Please Enter Email',
            'mobile.required'   =>  'Please Enter Mobile',
            'message.required'  =>  'Please Enter Message',
            'mobile.numeric'    =>  'Please Enter Mobile No. in numbers',
        ]);

        ContactUs::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'mobile'    =>  $request->mobile,
            'message'   =>  $request->message,
        ]);

        return redirect('contact-us')->with('success', 'Enquiry Added');
    }
}
