<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\RelatedProducts;
use App\Models\ProductReview;

class ProductController extends Controller
{

    public function index($product)
    {
        $product = Product::where('slug',$product)->with('medias','category.parent.parent')->orderby('sequence','asc')->first();
        $variants = Product::where('item_name', $product->item_name)->where('ecom','ONLINE')->get();
        $medias = ProductMedia::where('product_id',$product->id)->orderby('sequence','asc')->get();
        $reviews = ProductReview::where(['product_id' => $product->id])->orderBy('created_at','desc')->take(5)->get();
        $related_ids = array();
        $related_data = RelatedProducts::where('main_id',$product->id)->orderby('sequence','asc')->get();
        foreach($related_data as $related){
            array_push($related_ids, $related->related_id);
        }

        $related_products = Product::whereIn('id', $related_ids)->get();
        if($related_products->isEmpty()){
            $related_products = Product::where([['parent_id','=',$product->parent_id],['id','!=',$product->id]])->where('ecom','ONLINE')->get();
        }

        $data = $this->related($related_products);
        $related_variants = $data['related_variants'];
        $related_regular_prices = $data['related_regular_prices'];
        $related_sale_prices = $data['related_sale_prices'];
        $related_images = $data['related_images'];
        $related_variants_id = $data['related_variants_id'];

        return view('frontend.product.detail', compact('product','variants','medias','related_products','related_variants','related_regular_prices','related_sale_prices','related_variants_id','related_images','reviews'));
    }

    public function related($related_products)
    {
        $related_variants = array();
        $related_variants_id = array();
        $related_regular_prices = array();
        $related_sale_prices = array();
        $related_images = array();
        foreach($related_products as $related_product){
            if(isset($related_product) && !empty($related_product)){
                $allvariants = Product::where('item_name', $related_product->item_name)->where('ecom','ONLINE')->orderby('sequence','asc')->get();
                $media = ProductMedia::where(['product_id' => $allvariants[0]->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
                array_push($related_variants_id,!empty($allvariants[0]->id) ? $allvariants[0]->id : "");
                array_push($related_variants, !empty($allvariants[0]->slug) ? $allvariants[0]->slug : "");
                array_push($related_regular_prices, !empty($allvariants[0]->regular_price) ? $allvariants[0]->regular_price : "");
                array_push($related_sale_prices, !empty($allvariants[0]->sale_price) ? $allvariants[0]->sale_price : "");
                array_push($related_images, !empty($media->media) ? $media->media: "" );
            }
        }

        $data['related_variants_id'] = $related_variants_id;
        $data['related_variants'] = $related_variants;
        $data['related_regular_prices'] = $related_regular_prices;
        $data['related_sale_prices'] = $related_sale_prices;
        $data['related_images'] = $related_images;

        return $data;
    }
}
