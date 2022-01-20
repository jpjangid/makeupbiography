<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class BulkUploadController extends Controller
{
    public function index()
    {
        return view('backend.bulkupload.index');
    }

    public function upload(Request $request)
    {
        ini_set('memory_limit', '-1');
        $request->validate([
            'file'      =>  'required',
        ]);

        Excel::import(new ProductImport, $request->file('file')->store('temp'));

        $categories = Product::select('id', 'main_cat_name', 'cat_name', 'sub_cat_name', 'brand_name')->get()->toArray();
        $parent_id = NULL;
        $brand_id = NULL;
        foreach ($categories as $category) {
            if (!empty($category['main_cat_name'])) {
                $exist = Category::where('name', $category['main_cat_name'])->first();
                if (!empty($exist)) {
                    $parent_id = $exist->id;
                } else {
                    $cat = Category::create([
                        'name'      =>  $category['main_cat_name'],
                        'slug'      =>  $this->convertnametoslug($category['main_cat_name']),
                        'parent_id' =>  $parent_id,
                        'status'    =>  '1',
                    ]);
                    $parent_id = $cat->id;
                }
            }

            if (!empty($category['cat_name'])) {
                $exist = Category::where('name', $category['cat_name'])->first();
                if (!empty($exist)) {
                    $parent_id = $exist->id;
                } else {
                    $cat = Category::create([
                        'name'      =>  $category['cat_name'],
                        'slug'      =>  $this->convertnametoslug($category['cat_name']),
                        'parent_id' =>  $parent_id,
                        'status'    =>  '1',
                    ]);
                    $parent_id = $cat->id;
                }
            }

            if (!empty($category['sub_cat_name'])) {
                $exist = Category::where('name', $category['sub_cat_name'])->first();
                if (!empty($exist)) {
                    $parent_id = $exist->id;
                } else {
                    $cat = Category::create([
                        'name'      =>  $category['sub_cat_name'],
                        'slug'      =>  $this->convertnametoslug($category['sub_cat_name']),
                        'parent_id' =>  $parent_id,
                        'status'    =>  '1',
                    ]);
                    $parent_id = $cat->id;
                }
            }

            if (!empty($category['brand_name'])) {
                $exist = Brand::where('name', $category['brand_name'])->first();
                if (!empty($exist)) {
                    $brand_id = $exist->id;
                } else {
                    $brand = Brand::create([
                        'name'      =>  $category['brand_name'],
                        'slug'      =>  $this->convertnametoslug($category['brand_name']),
                    ]);
                    $brand_id = $brand->id;
                }
            }

            $product = Product::find($category['id']);
            $product->brand_id = $brand_id;
            $product->parent_id = $parent_id;
            $product->update();

            $parent_id = NULL;
            $brand_id = NULL;
        }

        return back();
    }

    public function convertnametoslug($name)
    {
        $slug = strtolower($name);
        $slug = str_replace(" ", "-", $slug);
        return $slug;
    }
}
