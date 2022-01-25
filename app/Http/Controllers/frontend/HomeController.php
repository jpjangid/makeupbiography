<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\FooterBanner;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //home page frontend function 
    public function index()
    {
        $main_categories = DB::table('categories')->where(['flag' => 0, 'status' => 1])->where('parent_id', null)->get();
        $main_newest_products = Product::where(['flag' => 0, 'status' => 1, 'ecom' => 'ONLINE'])->where('tags', 'like', '%' . 'newest' . '%')->where('ecom','ONLINE')->with(['medias' => function ($query) {
            $query->where(['flag' => 0,'media_type' => 'image'])->orderBy('sequence', 'asc');
        }])->orderBy('created_at', 'DESC')->take(25)->get();
        $main_popular_products = Product::where(['flag' => 0, 'status' => 1, 'ecom' => 'ONLINE'])->where('tags', 'like', '%' . 'popular' . '%')->where('ecom','ONLINE')->with(['medias' => function ($query) {
            $query->where(['flag' => 0,'media_type' => 'image'])->orderBy('sequence', 'asc');
        }])->orderBy('created_at', 'DESC')->take(25)->get();
        $main_category_products = Product::where(['flag' => 0, 'status' => 1, 'ecom' => 'ONLINE'])->where('tags', 'like', '%' . 'category' . '%')->where('ecom','ONLINE')->with(['medias' => function ($query) {
            $query->where(['flag' => 0,'media_type' => 'image'])->orderBy('sequence', 'asc');
        }])->orderBy('created_at', 'DESC')->take(25)->get();
        $main_brand_products = Product::where(['flag' => 0, 'status' => 1, 'ecom' => 'ONLINE'])->where('tags', 'like', '%' . 'brand' . '%')->where('ecom','ONLINE')->with(['medias' => function ($query) {
            $query->where(['flag' => 0,'media_type' => 'image'])->orderBy('sequence', 'asc');
        }])->orderBy('created_at', 'DESC')->take(25)->get();
        $big_offer_products = Product::where(['flag' => 0, 'status' => 1, 'ecom' => 'ONLINE'])->where('tags', 'like', '%' . 'big discount' . '%')->where('ecom','ONLINE')->with(['medias' => function ($query) {
            $query->where(['flag' => 0,'media_type' => 'image'])->orderBy('sequence', 'asc')->first();
        }])->orderBy('updated_at', 'DESC')->take(10)->get();
        $footer_banners = DB::table('footer_banners')->where('image', '!=', "")->where('status', 1)->get();
        return view('frontend.main.index', compact('main_categories', 'main_newest_products', 'main_popular_products', 'main_category_products', 'main_brand_products', 'big_offer_products', 'footer_banners'));
    }

    public function search(Request $request)
    {
        //product search algo
        $word = str_replace(" ","%",$request->q);
        $products = DB::table('products')->select('id','item_shade_name','item_name','regular_price','sale_price','slug','short_description','status','flag','ecom')->where('item_shade_name', 'like', '%' . $word . '%')->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->take(50)->get();
        $product_list_items = array();
        foreach ($products as $product) {
            array_push($product_list_items, $this->searchListItems($product));
        }

        return response()->json($product_list_items);
    }

    public function searchListItems($product)
    {
        $product_url = url('products', ['product' => $product->slug]);
        $media = DB::table('product_media')->where(['product_id' => $product->id, 'media_type' => 'image'])->orderby('sequence','asc')->first();
        $product_image = '';
        if(!empty($media)){
            $product_image = asset('storage/products/variants/' . $media->media);
        }
        $html = '<a class="c-header-search__link" href="' . $product_url . '">
                    <div class="c-header-search__row">
                        <div class="c-header-search__thumb">
                            <img width="115" height="115" src="' . $product_image . '" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy" srcset="' . $product_image . ' 1200w" sizes="(max-width: 115px) 100vw, 115px">							
                        </div>
                        <div class="c-header-search__col">
                            <div class="c-header-search__title">
                                ' . $product->item_shade_name . '	    							
                            </div>
                            <div class="c-header-search__short-desc">
                                <p>' . $product->short_description . '</p>
                            </div>
                            <div class="c-header-search__price">
                                <del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>45.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>40.00</bdi></span></ins>
                            </div>															    
                        </div>
                    </div>
                </a>';
        return $html;
    }
}
