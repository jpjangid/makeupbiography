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
        $main_newest_products = Product::where(['flag' => 0,'status' => 1])->where('tags','like','%'.'newest'.'%')->orWhere('tags','like','%'.'popular'.'%')->orWhere('tags','like','%'.'category'.'%')->orWhere('tags','like','%'.'brand'.'%')->with(['variants' => function($query) { $query->where(['flag'=>0])->orderBy('sequence','asc')->first(); }])->orderBy('created_at', 'DESC')->take(5)->get();
        $big_offer_products = Product::where(['flag' => 0,'status' => 1])->where('tags','like','%'.'big discount'.'%')->with(['variants' => function($query) { $query->where(['flag'=>0])->where('discount','>',0)->orderBy('sequence','asc')->first(); }])->orderBy('updated_at', 'DESC')->take(6)->get();
        // dd($big_offer_products);
        return view('frontend.main.index',compact('main_categories','main_newest_products','big_offer_products'));
    }
}
