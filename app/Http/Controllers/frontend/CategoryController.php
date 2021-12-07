<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantMedia;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use PhpParser\ErrorHandler\Collecting;

class CategoryController extends Controller
{

    //for category page
    public function index(Request $request,$slug)
    {
        // dd($request->all());
        $main_category = Category::where('slug',$slug)->with('parent.parent')->first();
        $parent_id = $this->findParent($main_category->id);
        $sub_categories = Category::where('parent_id',$parent_id)->with('subcategory')->get();
        $categories = Category::where('parent_id',$main_category->id)->get();
        $brands = Brand::select('id','name')->where(['status' => 1,'flag' =>  0])->get();
        $product_category = array();
        $min_price_filter = 0;
        $max_price_filter = DB::table('product_variants')->max('sale_price')+100;
        $min_price_old = 0;
        $max_price_old = 0;
        if(!empty($request->min_price_filter)){
            $min_price_old = floatval($request->min_price_filter);
        }
        if(!empty($request->max_price_filter)){
            $max_price_old = floatval($request->max_price_filter);
        }

        //fiter function begin
        $filter_old = array();
        $filter_old_price = array();
        $filter_sorting = "";
        $filter_brands = array();
        
        //brands filter begin 
        if(!empty($request->filter_brand) && count($request->filter_brand) > 0){
            $filter_brands = array_merge($filter_brands,$request->filter_brand);
        }        
        //brands filter end

        if(empty($request->filter_category)) {
            array_push($filter_old,$main_category->slug);
            array_push($product_category,$main_category->id); 
        }
        
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            if(in_array($main_category->slug,$request->filter_category)) {
                array_push($filter_old,$main_category->slug);
                array_push($product_category,$main_category->id);    
            }

            $check_categories = Category::select('id')->whereIn('slug',$request->filter_category)->get()->toArray();
            $check_categories = array_column($check_categories,'id');
            $request->check_categories = $check_categories;
            $filter_old = $request->filter_category;   
        }
        
        //filter function end
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            $product_category = array_merge($product_category,$request->check_categories);
        }

        if(!empty($request->price_range) && count($request->price_range) > 0) {
            $filter_old_price = array_merge($filter_old_price,$request->price_range);
        }

        //filter sorting begin
        if(!empty($request->orderby)) {
            if($request->orderby == "lowtohigh") {
                $filter_sorting = "lowtohigh";
            }
            if($request->orderby == "hightolow") {
                $filter_sorting = "hightolow";
            }
        }
        //filter sorting end

        $products1 = DB::table('products')->select('id')->whereIn('parent_id',$product_category)->where(['status'=>1,'flag'=>0]);

       
        if(count($filter_brands) > 0) {
            $products = $products1->whereIn('brand_id',$filter_brands);
        }
        $products1 = $products1->get()->toArray();

        $products = DB::table('product_variants')->select('product_id','id')->distinct('product_id')->whereIn('product_id',array_column($products1,'id'));
        if(!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
            $products = $products->whereBetween('sale_price',array(floatval($request->min_price_filter),floatval($request->max_price_filter)));
        }
        if(!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price','ASC');
        }
        if(!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price','DESC');
        }   
        $products = $products->get()->unique('product_id')->toArray();
        
        $products = DB::table('product_variants')->whereIn('id',array_column($products,'id'));
        if(!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
            $products = $products->whereBetween('sale_price',array(floatval($request->min_price_filter),floatval($request->max_price_filter)));
        }
        if(!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price','ASC');
        }
        if(!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price','DESC');
        }   
        $products = $products->paginate(5); 

        $product_details = array();
        $product_medias = array();
        foreach($products as $pro) {
            array_push($product_details,Product::where('id',$pro->product_id)->first());
            array_push($product_medias,ProductVariantMedia::where('product_variant_id',$pro->id)->where('flag',0)->first());
        }
        $product_details = collect($product_details);
        $product_medias = collect($product_medias);

        return view('frontend.product.category', compact('main_category','slug','sub_categories','categories','brands','products','product_medias','product_details','filter_old','filter_old_price','max_price_filter','min_price_filter','filter_sorting','filter_brands','min_price_old','max_price_old'));
    }

    static function findParent($id) {
        $cat = Category::where('id',$id)->first();
        if($cat->parent_id != null) {
            $p = self::findParent($cat->parent_id);
            return $p;
        }
         else {
            return $cat->id;
        }
    }

    //for shop page
    public function shop(Request $request)
    {
        $sub_categories = Category::where(['parent_id' => null,'status' => 1,'flag' => 0])->with('subcategory.subcategory')->get();
        $brands = Brand::select('id','name')->where(['status' => 1,'flag' =>  0])->get();
        $product_category = array();
        $min_price_filter = 0;
        $max_price_filter = DB::table('product_variants')->max('sale_price')+100;
        $min_price_old = 0;
        $max_price_old = 0;
        if(!empty($request->min_price_filter)){
            $min_price_old = floatval($request->min_price_filter);
        }
        if(!empty($request->max_price_filter)){
            $max_price_old = floatval($request->max_price_filter);
        }

        //fiter function begin
        $filter_old = array();
        $filter_old_price = array();
        $filter_sorting = "";
        $filter_brands = array();
        
        //brands filter begin 
        if(!empty($request->filter_brand) && count($request->filter_brand) > 0){
            $filter_brands = array_merge($filter_brands,$request->filter_brand);
        } 
        //brands filter end
      
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            $check_categories = Category::select('id')->whereIn('slug',$request->filter_category)->get()->toArray();
            $check_categories = array_column($check_categories,'id');
            $request->check_categories = $check_categories;
            $filter_old = $request->filter_category;   
        }
        
        //filter function end
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            $product_category = array_merge($product_category,$request->check_categories);
        }

        if(!empty($request->price_range) && count($request->price_range) > 0) {
            $filter_old_price = array_merge($filter_old_price,$request->price_range);
        }

        //filter sorting begin
        if(!empty($request->orderby)) {
            if($request->orderby == "lowtohigh") {
                $filter_sorting = "lowtohigh";
            }
            if($request->orderby == "hightolow") {
                $filter_sorting = "hightolow";
            }
        }
        //filter sorting end
        
        $products1 = DB::table('products')->select('id')->where(['status'=>1,'flag'=>0]);
        if(!empty($filter_brands) && count($filter_brands) > 0) {
            $products1 = $products1->whereIn('brand_id',$filter_brands);
        }

        if(count($product_category) > 0) {
            $products1 = $products1->whereIn('parent_id',$product_category);
        }
        $products1 = $products1->get()->toArray();

        $products = DB::table('product_variants')->distinct('product_id')->whereIn('product_id',array_column($products1,'id'));
        if(!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
            $products = $products->whereBetween('sale_price',array(floatval($request->min_price_filter),floatval($request->max_price_filter)));
        }
        if(!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price','ASC');
        }
        if(!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price','DESC');
        }   
        $products = $products->paginate(100)->unique('product_id'); 

        $product_details = array();
        $product_medias = array();
        foreach($products as $pro) {
            array_push($product_details,Product::where('id',$pro->product_id)->first());
            array_push($product_medias,ProductVariantMedia::where('product_variant_id',$pro->id)->where('flag',0)->first());
        }
        $product_details = collect($product_details);
        $product_medias = collect($product_medias);

        return view('frontend.product.shop', compact('sub_categories','brands','products','product_medias','product_details','filter_old','filter_old_price','max_price_filter','min_price_filter','filter_sorting','filter_brands','min_price_old','max_price_old'));
    }

}
