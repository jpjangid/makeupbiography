<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        ini_set('memory_limit', '-1');
        $request->validate([
            'updateexcel'      =>  'required',
        ]);


        Excel::import(new CategoryImport, $request->file('updateexcel')->store('temp'));
        return back();
    }

    // public function imageupload(Request $request)
    // {
    //     $brand = array('BBLUNT', 'KAY BEAUTY', 'LAKME', 'MAMAEARTH', 'WAHL');
    //     $products = DB::table('products')->select('brand_name', 'sku')->whereIn('brand_name', $brand) ->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->get();

    //     foreach ($products as $product) {
    //         // $ftp = Storage::createFtpDriver([
    //         //     'host'     => '103.156.21.5',
    //         //     'username' => '28user',
    //         //     'password' => 'user@321',
    //         //     'port'     => '', // your ftp port
    //         //     'timeout'  => '30', // timeout setting 
    //         // ]);

    //         // $fileName = $product->sku . ".jpg";
    //         // $file_path = "/".$product->brand_name."/" . $fileName;
    //         // Storage::disk('ftp')->put('public', $fileName);
    //         // if(Storage::disk('ftp')->exists($file_path)){
    //         //     dd(1);
    //         // }
    //         // dd($file_path);
    //         // $filecontent = $ftp->get($file_path); // read file content 

    //         // $reponse = Response::make($filecontent, '200', array(
    //         //     'Content-Type' => 'application/octet-stream',
    //         //     'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
    //         // ));
    //         // dd($reponse);

    //         $ftp_server = "103.156.21.5";
    //         $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
    //         ftp_login($conn_id, "28user", "user@321");
    //         $path = "/" . $product->brand_name . "/"; //the path where the file is located

    //         $file = $product->sku . ".jpg"; //the file you are looking for

    //         $check_file_exist = $path . $file; //combine string for easy use

    //         $contents_on_server = ftp_nlist($conn_id, $path);
    //         dd($contents_on_server);
    //         if (in_array($check_file_exist, $contents_on_server)) {
    //             dd($check_file_exist);
    //         } else {
    //             echo "<br>";
    //             echo $check_file_exist . " not found in directory : " . $path;
    //         };
    //         dd($contents_on_server);
    //         // ftp_close($conn_id);
    //     }
    // }

    public function imageupload(Request $request)
    {
        $brands = array('BBLUNT', 'KAY BEAUTY', 'LAKME', 'MAMAEARTH', 'WAHL');
        
        foreach ($brands as $brand) {
            $ftp_server = "103.156.21.5";
            $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
            ftp_login($conn_id, "28user", "user@321");
            $path = "/" . $brand . "/";
            $contents = ftp_nlist($conn_id, $path);
            foreach ($contents as $content) {
                $file_name = current(array_reverse(explode('/', $content)));
                $expload = explode('.',$file_name);
                $product = Product::where('sku',$expload[0])->first();
                $productmedia = ProductMedia::where('product_id',$product->id)->first();
                if(!empty($productmedia)){
                    $productmedia->media        = $file_name;
                    $productmedia->media_alt    = $file_name;
                    $productmedia->update();
                }else{
                    ProductMedia::create([
                        'product_id'    =>  $product->id,
                        'media'         =>  $file_name,
                        'media_alt'     =>  $file_name,
                        'media_type'    =>  'image',
                        'sequence'      =>  '1'
                    ]);
                }
                $file = Storage::disk('ftp')->get($content);
                Storage::disk('local')->put('public/products/variants/' . $file_name, $file);
            }
        }
        dd("done");
    }
}
