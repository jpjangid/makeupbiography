<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\FooterBanner;

class HomeController extends Controller
{
    //home page frontend function 
    public function index()
    {
        $main_categories = Category::where(['flag' => 0,'status' => 1])->where('parent_id',null)->get();
        $main_newest_products = Product::where(['flag' => 0,'status' => 1])->where('tags','like','%'.'newest'.'%')->orWhere('tags','like','%'.'popular'.'%')->orWhere('tags','like','%'.'category'.'%')->orWhere('tags','like','%'.'brand'.'%')->with(['variants' => function($query) { $query->where(['flag'=>0])->orderBy('sequence','asc')->first(); }])->orderBy('created_at', 'DESC')->take(5)->get();
        $big_offer_products = Product::where(['flag' => 0,'status' => 1])->where('tags','like','%'.'big discount'.'%')->with(['variants' => function($query) { $query->where(['flag'=>0])->where('discount','>',0)->orderBy('sequence','asc')->first(); }])->orderBy('updated_at', 'DESC')->take(6)->get();
        $footer_banners = FooterBanner::where('image','!=',"")->where('status',1)->get();
        
        return view('frontend.main.index',compact('main_categories','main_newest_products','big_offer_products','footer_banners'));
    }

    public function search(Request $request)
    {
        //product search algo
        $products = Product::where(['flag' => 0,'status' => 1])->where('name','like','%'.$request->q.'%')->get();
        $product_list_items = array();
        foreach($products as $product) {
            $variant = ProductVariant::where(['flag'=>0,'product_id' => $product->id])->orderBy('sequence','asc')->first();
            if(!empty($variant)) {
                array_push($product_list_items,$this->searchListItems($product));
            }   
        }
       
        return response()->json($product_list_items);
    }

    public function searchListItems($product)
    {
        $variant = ProductVariant::where(['flag'=>0,'product_id' => $product->id])->orderBy('sequence','asc')->first();
        $product_url = url('products',['product' => $product->slug, 'variant' => $variant->slug ]);
        $product_image = asset('storage/products/'.$product->main_image);
        $html = '<a class="c-header-search__link" href="'.$product_url.'">
                    <div class="c-header-search__row">
                        <div class="c-header-search__thumb">
                            <img width="115" height="115" src="'.$product_image.'" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy" srcset="'.$product_image.' 1200w" sizes="(max-width: 115px) 100vw, 115px">							
                        </div>
                        <div class="c-header-search__col">
                            <div class="c-header-search__title">
                                '.$product->name.'-'.$variant->name.'	    							
                            </div>
                            <div class="c-header-search__short-desc">
                                <p>'.$product->short_description.'</p>
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
