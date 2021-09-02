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
        $related_products = Product::where([['parent_id','=',$product->parent_id],['id','!=',$product->id]])->take(3)->get();
        $related_variants = array();
        $related_prices = array();
        foreach($related_products as $related_product){
            if(isset($related_product) && !empty($related_product)){
                $allvariants = ProductVariant::where('product_id', $related_product->id)->orderby('sequence','asc')->get();
                array_push($related_variants, $allvariants[0]->slug);
                array_push($related_prices, $allvariants[0]->sale_price);
            }
        }

        return view('frontend.product.detail', compact('product','variant','medias','related_products','related_variants','related_prices'));
    }
}
