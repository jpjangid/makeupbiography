<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index($product)
    {
        $product = Product::where('slug',$product)->with('medias','category.parent.parent')->orderby('sequence','asc')->first();
        $variants = DB::table('products')->where('item_name', $product->item_name)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->get();
        $medias = DB::table('product_media')->where('product_id',$product->id)->orderby('sequence','asc')->get();
        $reviews = DB::table('product_reviews')->where(['product_id' => $product->id])->orderBy('created_at','desc')->take(5)->get();
        $related_ids = array();
        $related_data = DB::table('related_products')->where('main_id',$product->id)->orderby('sequence','asc')->get();
        foreach($related_data as $related){
            array_push($related_ids, $related->related_id);
        }

        $related_products = DB::table('products')->whereIn('id', $related_ids)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->get();
        if($related_products->isEmpty()){
            $related_products = DB::table('products')->where([['parent_id','=',$product->parent_id],['id','!=',$product->id]])->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->get();
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
                $allvariants = DB::table('products')->where('item_name', $related_product->item_name)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->orderby('sequence','asc')->get();
                $media = DB::table('product_media')->where(['product_id' => $allvariants[0]->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
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
