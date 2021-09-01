<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantMedia;

class ProductController extends Controller
{
    public function index($product,$variant)
    {
        $product = Product::where('slug',$product)->with('variants.medias','category.parent.parent')->first();
        $variant = ProductVariant::where('slug',$variant)->first();
        $medias = ProductVariantMedia::where('product_variant_id',$variant->id)->orderby('sequence','asc')->get();

        return view('frontend.product.detail', compact('product','variant','medias'));
    }
}
