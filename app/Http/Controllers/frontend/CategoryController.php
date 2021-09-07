<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $main_category = Category::where('slug',$slug)->with('parent.parent')->first();
        $categories = Category::where('parent_id',$main_category->id)->get();
        $products = Product::where('parent_id',$main_category->id)->with('variants.medias')->get();
        $variants = array();
        $variant_ids = array();
        foreach($products as $product){
            if(isset($product) && !empty($product)){
                $allvariants = ProductVariant::where('product_id', $product->id)->orderby('sequence','asc')->get();
                array_push($variants, $allvariants[0]->slug);
                array_push($variant_ids,$allvariants[0]->id);
            }
        }

        return view('frontend.product.category', compact('main_category','categories','products','variants','variant_ids'));
    }
}
