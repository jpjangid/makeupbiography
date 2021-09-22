<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // $user = auth()->user();
        // if(empty($user)){
        //     return redirect('/login');
        // }

        ProductReview::create([
            'rating'                =>  $request->rating,
            'comment'               =>  $request->comment,
            'name'                  =>  $request->name,
            'email'                 =>  $request->email,
            'product_id'            =>  $request->product_id,
            'product_variant_id'    =>  $request->variant_id,
        ]);

        return redirect()->back()->with('success','Review Added Successfully');
    }
}
