<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table('brands')->where(['top_brand_status' => 1, 'status' => 1, 'flag' => 0])->get();
        $allBrands = DB::table('brands')->where(['status' => 1, 'flag' => 0])->orderBy('name')->get();

        $brandGroups = $allBrands->groupBy(function ($item, $key) {
            return $item->name[0];     //treats the name string as an array
        })->sortBy(function ($item, $key) {      //sorts A-Z at the top level
            return $key;
        });

        return view('frontend.brand.index', compact('brands', 'brandGroups'));
    }

    public function index_brands(Request $request, $slug)
    {
        $sub_categories = Category::where(['parent_id' => null, 'status' => 1, 'flag' => 0])->with('subcategory.subcategory')->get();
        $main_brand = DB::table('brands')->where(['slug' => $slug, 'status' => 1, 'flag' => 0])->first();
        $brands = DB::table('brands')->select('id', 'name')->where(['status' => 1, 'flag' =>  0])->get();
        $product_category = array();
        $min_price_filter = 0;
        $max_price_filter = DB::table('products')->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->max('sale_price') + 100;
        $min_price_old = 0;
        $max_price_old = 0;
        if (!empty($request->min_price_filter)) {
            $min_price_old = floatval($request->min_price_filter);
        }
        if (!empty($request->max_price_filter)) {
            $max_price_old = floatval($request->max_price_filter);
        }

        //fiter function begin
        $filter_old = array();
        $filter_old_price = array();
        $filter_sorting = "";
        $filter_brands = array();

        //brands filter begin 
        if (!empty($request->filter_brand) && count($request->filter_brand) > 0) {
            $filter_brands = array_merge($filter_brands, $request->filter_brand);
        }
        if (!in_array($main_brand->id, $filter_brands)) {
            array_push($filter_brands, $main_brand->id);
        }

        //brands filter end

        // if(empty($request->filter_category)) {
        //     array_push($filter_old,$main_category->slug);
        //     array_push($product_category,$main_category->id); 
        // }

        if (!empty($request->filter_category) && count($request->filter_category) > 0) {
            $check_categories = DB::table('categories')->select('id')->whereIn('slug', $request->filter_category)->get()->toArray();
            $check_categories = array_column($check_categories, 'id');
            $request->check_categories = $check_categories;
            $filter_old = $request->filter_category;
        }

        //filter function end
        if (!empty($request->filter_category) && count($request->filter_category) > 0) {
            $product_category = array_merge($product_category, $request->check_categories);
        }

        if (!empty($request->price_range) && count($request->price_range) > 0) {
            $filter_old_price = array_merge($filter_old_price, $request->price_range);
        }

        //filter sorting begin
        if (!empty($request->orderby)) {
            if ($request->orderby == "lowtohigh") {
                $filter_sorting = "lowtohigh";
            }
            if ($request->orderby == "hightolow") {
                $filter_sorting = "hightolow";
            }
        }
        //filter sorting end
        // $products = DB::table('products')->whereIn('brand_id', $filter_brands)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE']);
        $products = Product::with('first_medias')->select('products.*', 'discount_details.discount_type as p_discount_type', 'discount_details.discount as p_discount')->whereHas("first_medias", function ($query) {
            $query->where('media', '!=', '');
        })->whereIn('brand_id', $filter_brands)->where(['status' => 1, 'flag' => 0])->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->leftJoin('discount_details', 'products.id', '=', 'discount_details.product_id');
        // dd($products->take(5)->get());
        if (count($product_category) > 0) {
            $products = $products->whereIn('parent_id', $product_category);
        }

        if (!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
            $products = $products->whereBetween('sale_price', array(floatval($request->min_price_filter), floatval($request->max_price_filter)));
        }
        if (!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price', 'ASC');
        }
        if (!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price', 'DESC');
        }
        $products = $products->paginate(12);
        // $product_details = array();
        $product_medias = array();
        foreach ($products as $pro) {
            // array_push($product_details, DB::table('products')->select('products.*', 'discount_details.discount_type as p_discount_type', 'discount_details.discount as p_discount')->where('id', $pro->id)->leftJoin('discount_details', 'products.id', '=', 'discount_details.product_id')->first());
            array_push($product_medias, DB::table('product_media')->where('product_id', $pro->id)->where(['flag' => 0, 'media_type' => 'image'])->orderby('sequence', 'asc')->first());
        }


        $product_medias = collect($product_medias);
        $last_page = $products->lastPage();
        $current_page = $products->currentPage();
        $no_of_pages = array();
        for ($i = $current_page; $i <= $current_page + 3; $i++) {
            if ($i <= $last_page) {
                array_push($no_of_pages, $i);
            }
        }
        if (count($no_of_pages) < 4) {
            if (isset($no_of_pages[0]) && $last_page == $no_of_pages[0]) {
                for ($i = 1; $i <= 3; $i++) {
                    $new = $no_of_pages[0] - $i;
                    if ($new > 0) {
                        array_push($no_of_pages, $new);
                    }
                }
            }
            if (isset($no_of_pages[1]) && $last_page == $no_of_pages[1]) {
                for ($i = 1; $i <= 2; $i++) {
                    $new = $no_of_pages[0] - $i;
                    if ($new > 0) {
                        array_push($no_of_pages, $new);
                    }
                }
            }
            if (isset($no_of_pages[2]) && $last_page == $no_of_pages[2]) {
                $new = $no_of_pages[0] - 1;
                if ($new > 0) {
                    array_push($no_of_pages, $new);
                }
            }
        }
        sort($no_of_pages);

        $prev = 'true';
        if ($products->currentPage() == 1) {
            $prev = 'false';
        }

        $next = 'true';
        if ($products->lastPage() == $products->currentPage()) {
            $next = 'false';
        }
        $product_details = $products;
        return view('frontend.brand.brands', compact('slug', 'sub_categories', 'main_brand', 'brands', 'products', 'product_medias', 'product_details', 'filter_old', 'filter_old_price', 'max_price_filter', 'min_price_filter', 'filter_sorting', 'filter_brands', 'min_price_old', 'max_price_old', 'no_of_pages', 'next', 'prev'));
    }
}
