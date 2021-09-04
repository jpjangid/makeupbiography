<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'billing_name'          =>  'required',
            'billing_mobile'        =>  'required',
            'billing_address'       =>  'required',
            'billing_country'       =>  'required',
            'billing_state'         =>  'required',
            'billing_city'          =>  'required',
            'billing_zip'           =>  'required',
        ],[
            'billing_name.required'         =>  'Billing Name is required',
            'billing_mobile.required'       =>  'Billing Mobile is required',
            'billing_address.required'      =>  'Billing Address is required',
            'billing_country.required'      =>  'Billing Country is required',
            'billing_state.required'        =>  'Billing State is required',
            'billing_city.required'         =>  'Billing City is required',
            'billing_zip.required'          =>  'Billing Zip is required',
        ]);

        $order_no = $this->quickRandom(20);
    }

    function quickRandom($length)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
