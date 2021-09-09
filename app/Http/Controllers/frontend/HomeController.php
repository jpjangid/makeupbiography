<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    //home page frontend function 
    public function index()
    {
        $main_categories = Category::where(['flag' => 0,'status' => 1])->where('parent_id',null)->get();
        $main_newest_products = Product::where(['flag' => 0,'status' => 1])->with('variants')->orderBy('created_at', 'DESC')->take(5)->get();
        // dd($main_newest_products);
        return view('frontend.main.index',compact('main_categories','main_newest_products'));
    }
}
