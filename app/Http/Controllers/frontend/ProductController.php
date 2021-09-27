<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantMedia;
use App\Models\RelatedProducts;
use App\Models\ProductReview;

class ProductController extends Controller
{

    public function index($product,$variant)
    {
        $product = Product::where('slug',$product)->with('variants.medias','category.parent.parent')->first();
        $variant = ProductVariant::where('slug',$variant)->first();
        $medias = ProductVariantMedia::where('product_variant_id',$variant->id)->orderby('sequence','asc')->get();
        $reviews = ProductReview::where(['product_id' => $product->id,'product_variant_id' => $variant->id])->orderBy('created_at','ASC')->take(5)->get();
        $related_ids = array();
        $related_data = RelatedProducts::where('main_id',$product->id)->orderby('sequence','asc')->get();
        foreach($related_data as $related){
            array_push($related_ids, $related->related_id);
        }

        $related_products = Product::whereIn('id', $related_ids)->get();
        if($related_products->isEmpty()){
            $related_products = Product::where([['parent_id','=',$product->parent_id],['id','!=',$product->id]])->get();
        }

        $data = $this->related($related_products);
        $related_variants = $data['related_variants'];
        $related_prices = $data['related_prices'];
        $related_images = $data['related_images'];
        $related_variants_id = $data['related_variants_id'];

        return view('frontend.product.detail', compact('product','variant','medias','related_products','related_variants','related_prices','related_variants_id','related_images','reviews'));
    }

    public function related($related_products)
    {
        $related_variants = array();
        $related_variants_id = array();
        $related_prices = array();
        $related_images = array();
        foreach($related_products as $related_product){
            if(isset($related_product) && !empty($related_product)){
                $allvariants = ProductVariant::where('product_id', $related_product->id)->orderby('sequence','asc')->get();
                $media = ProductVariantMedia::where(['product_variant_id' => $allvariants[0]->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
                array_push($related_variants_id,!empty($allvariants[0]->id) ? $allvariants[0]->id : "");
                array_push($related_variants, !empty($allvariants[0]->slug) ? $allvariants[0]->slug : "");
                array_push($related_prices, !empty($allvariants[0]->sale_price) ? $allvariants[0]->sale_price : "");
                array_push($related_images, !empty($media->media) ? $media->media: "" );
            }
        }

        $data['related_variants_id'] = $related_variants_id;
        $data['related_variants'] = $related_variants;
        $data['related_prices'] = $related_prices;
        $data['related_images'] = $related_images;

        return $data;
    }
}
