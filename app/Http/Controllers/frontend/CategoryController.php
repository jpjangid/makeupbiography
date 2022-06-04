<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    //for category page
    public function index(Request $request, $slug)
    {
        $main_category = Category::where('slug', $slug)->with('parent.parent')->first();
        $parent_id = $this->findParent($main_category->id);
        $sub_categories = Category::where('parent_id', $parent_id)->with(['subcategory' => function ($q) {
            $q->orderBy('name', 'asc');
        }])->orderBy('name', 'asc')->get();
        $categories = DB::table('categories')->where('parent_id', $main_category->id)->orderBy('name', 'asc')->get();
        $brands = DB::table('brands')->select('id', 'name')->where(['status' => 1, 'flag' =>  0])->orderBy('name', 'asc')->get();

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
        //brands filter end

        if (empty($request->filter_category)) {
            array_push($filter_old, $main_category->slug);
            array_push($product_category, $main_category->id);
        }

        if (!empty($request->filter_category) && count($request->filter_category) > 0) {
            if (in_array($main_category->slug, $request->filter_category)) {
                array_push($filter_old, $main_category->slug);
                array_push($product_category, $main_category->id);
            }

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

        $products1 = DB::table('products')->select('id')->whereIn('parent_id', $product_category)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE']);


        if (count($filter_brands) > 0) {
            $products = $products1->whereIn('brand_id', $filter_brands);
        }
        $products1 = $products1->get()->toArray();

        $products = DB::table('products')->select('id')->whereIn('id', array_column($products1, 'id'))->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE']);

        if (!empty($request->min_price_filter) && !empty($request->max_price_filter)) {
            $products = $products->whereBetween('sale_price', array(floatval($request->min_price_filter), floatval($request->max_price_filter)));
        }
        if (!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price', 'ASC');
        }
        if (!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price', 'DESC');
        }

        $products = $products->get()->toArray();

        $products = DB::table('products')->whereIn('id', array_column($products, 'id'))->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE']);
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

        $product_details = array();
        $product_medias = array();
        foreach ($products as $pro) {
            array_push($product_details, DB::table('products')->where('id', $pro->id)->first());
            array_push($product_medias, DB::table('product_media')->where('product_id', $pro->id)->where(['flag' => 0, 'media_type' => 'image'])->orderBy('sequence', 'asc')->first());
        }
        $product_details = collect($product_details);
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

        return view('frontend.product.category', compact('main_category', 'slug', 'sub_categories', 'categories', 'brands', 'products', 'product_medias', 'product_details', 'filter_old', 'filter_old_price', 'max_price_filter', 'min_price_filter', 'filter_sorting', 'filter_brands', 'min_price_old', 'max_price_old', 'no_of_pages', 'next', 'prev'));
    }

    static function findParent($id)
    {
        $cat = DB::table('categories')->select('parent_id', 'id')->where('id', $id)->first();
        if ($cat->parent_id != null) {
            $p = self::findParent($cat->parent_id);
            return $p;
        } else {
            return $cat->id;
        }
    }

    //for shop page
    public function shop(Request $request, $tag)
    {
        if ($tag == 'all') {
            $tag = NULL;
        }
        $cutsom_url = "";
        if (count($request->all()) > 1) {
            $url_check_values = $request->all();
            $url_check_values = array_diff_key(
                $url_check_values,
                array_flip((array) ['page', 'pagination'])
            );
            $cutsom_url = http_build_query($url_check_values);
        }
        $from = 0;
        $to = 10;
        $total_counts = 0;
        $sub_categories = Category::where(['parent_id' => null, 'status' => 1, 'flag' => 0])->with('subcategory.subcategory')->get();

        $brands = DB::table('brands')->select('id', 'name')->where(['top_brand_status' => 1, 'status' => 1, 'flag' =>  0])->get();
        $brand_array = $brands->toArray();

        $product_category = array();
        $min_price_filter = 0;
        $max_price_filter = DB::table('products')->where('tags', 'like', '%' . $tag . '%')->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->max('sale_price') + 100;

        $min_price_old = 0;
        $max_price_old = 0;
        if (isset($request->min_price_filter) && !empty($request->min_price_filter)) {
            $min_price_old = floatval($request->min_price_filter);
        }
        if (isset($request->max_price_filter) && !empty($request->max_price_filter)) {
            $max_price_old = floatval($request->max_price_filter);
        }

        if (!empty($request->from) || !empty($request->to)) {
            $from = intval($request->from);
            $to = intval($request->to);
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
        //brands filter end

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

        $brands1 = DB::table('brands')->select('id')->where(['top_brand_status' => 1, 'status' => 1, 'flag' =>  0]);

        $brand_array = $brands1->get()->toArray();
        $brands_array_data = array_column($brand_array, 'id');
        // dd($brands_array_data);

        $products = Product::with('first_medias')->whereHas("first_medias", function ($query) {
            $query->where('media', '!=', '');
        })->whereIn('brand_id', $brands_array_data)->where(['status' => 1, 'flag' => 0])->where('tags', 'like', '%' . $tag . '%')->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE']);

        if (!empty($filter_brands) && count($filter_brands) > 0) {
            $products = $products->whereIn('brand_id', $filter_brands);
        }

        if (count($product_category) > 0) {
            $products = $products->whereIn('parent_id', $product_category);
        }

        if (!empty($request->min_price_filter) && !empty($request->max_price_filter) && $request->max_price_filter > floatval(0)) {
            $products = $products->whereBetween('sale_price', array(floatval($request->min_price_filter), floatval($request->max_price_filter)));
        }
        if (!empty($request->orderby) && $request->orderby == "lowtohigh") {
            $products = $products->orderBy('sale_price', 'ASC');
        }
        if (!empty($request->orderby) && $request->orderby == "hightolow") {
            $products = $products->orderBy('sale_price', 'DESC');
        }
        $products = $products->paginate(12);

        $product_medias = array();
        foreach ($products as $pro) {
            array_push($product_medias, DB::table('product_media')->where('product_id', $pro->id)->where(['flag' => 0, 'media_type' => 'image'])->orderBy('sequence', 'asc')->first());
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
        if ($tag == Null) {
            $tag = 'all';
        }

        return view('frontend.product.shop', compact('sub_categories', 'brands', 'products', 'product_medias', 'filter_old', 'filter_old_price', 'max_price_filter', 'min_price_filter', 'filter_sorting', 'filter_brands', 'min_price_old', 'max_price_old', 'total_counts', 'from', 'to', 'no_of_pages', 'prev', 'next', 'tag', 'cutsom_url'));
    }
}
