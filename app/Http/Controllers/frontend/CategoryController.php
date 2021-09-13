<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{

    //for category page
    public function index(Request $request,$slug)
    {
        $main_category = Category::where('slug',$slug)->with('parent.parent')->first();
        $parent_id = $this->findParent($main_category->id);
        $sub_categories = Category::where('parent_id',$parent_id)->with('subcategory')->get();
        $categories = Category::where('parent_id',$main_category->id)->get();
        $product_category = array();
        $min_price_filter = 0;
        $max_price_filter = 1000;

        //fiter function begin
        $filter_old = array();
        $filter_old_price = array();
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            $check_categories = Category::select('id')->whereIn('slug',$request->filter_category)->get()->toArray();
            $check_categories = array_column($check_categories,'id');
            $request->check_categories = $check_categories;
            $filter_old = $request->filter_category; 
            array_push($filter_old,$main_category->slug);
        }
        //filter function end

        array_push($product_category,$main_category->id); 
        if(!empty($request->filter_category) && count($request->filter_category) > 0) {
            $product_category = array_merge($product_category,$request->check_categories);
        }

        if(!empty($request->price_range) && count($request->price_range) > 0) {
            $filter_old_price = array_merge($filter_old_price,$request->price_range);
        }

        $products = Product::whereIn('parent_id',$product_category)
        ->with(['variants' => function($query) use ($request) {
            if(!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
                $query->whereBetween('sale_price',array(floatval($request->min_price_filter),floatval($request->max_price_filter)));
            }
        },'variants.medias'])
        ->get();     

        $variants = array();
        $variant_ids = array();
        foreach($products as $product){
            if(isset($product) && !empty($product)){
                $allvariants = ProductVariant::where('product_id', $product->id)->orderby('sequence','asc')->get();
                array_push($variants, $allvariants[0]->slug);
                array_push($variant_ids,$allvariants[0]->id);
            }
        }

        return view('frontend.product.category', compact('main_category','slug','sub_categories','categories','products','variants','variant_ids','filter_old','filter_old_price','max_price_filter','min_price_filter'));
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
    public function shop()
    {
        $products = Product::where(['flag' => 0,'status' => 1])->with(['variants.medias'])->orderBy('updated_at','asc')->get();
        
        $variants = array();
        $variant_ids = array();
        foreach($products as $product){
                $allvariants = ProductVariant::where(['product_id' => $product->id,'flag' => 0])->orderby('sequence','asc')->get();
                array_push($variants, $allvariants[0]->slug);
                array_push($variant_ids,$allvariants[0]->id);
        }

        return view('frontend.product.shop', compact('products','variants','variant_ids'));
    }

}
