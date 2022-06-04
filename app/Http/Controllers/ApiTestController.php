<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ApiTestController extends Controller
{
    public $product = array();
    public $last_id = NULL;

    public function index()
    {
        ini_set('memory_limit', '200M');
        $code = 0;
        // 32635
        $product = Product::select('lastmodifycode')->get()->last();
        $code = !empty($product->lastmodifycode) ? $product->lastmodifycode : $code;
        $data = $this->fetchdata($code);
        $data = json_decode($data);
    }

    //Api for fetching data from logic 
    public function fetchdata($code)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://logic.azxcz.com:8442/api/GetItemMaster',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "GlobalModifyCode": ' . $code . ',
                "Doc_Codes": ""
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic QVBJMjhTVjphUEkjMzIx',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response);
        // dd($data);
        if (empty($data->GetData) && !empty($data->LastGlobalModifyCode)) {
            $this->last_id = $data->LastGlobalModifyCode;
            $this->fetchdata($data->LastGlobalModifyCode);
        }

        if (!empty($data->GetData)) {
            $this->last_id = $data->LastGlobalModifyCode;
            $this->storeData($data->GetData);
            $this->fetchdata($data->LastGlobalModifyCode);
        } else {
            $msg = "Data transfer complete";
            return $msg;
        }
    }

    //Api for storing data in database with help of api
    public function storeData($data)
    {
        foreach ($data as $data_a) {
            array_push($this->product, collect($data_a));
        }


        foreach ($data as $key => $value) {
            \Artisan::call('optimize:clear');
            $brand_slug = $this->convertnametoslug($value->Comp_Name);

            if (Brand::where(['slug' => $brand_slug])->first()) {
                $brand = Brand::where(['slug' => $brand_slug])->first();
            } else {
                $brand = Brand::create([
                    'name'  =>  $value->Comp_Name,
                    'slug'  =>  $brand_slug,
                ]);
            }

            //Initializing the category with NULL as per level of category
            $category_id1 = NULL;
            $category_id2 = NULL;
            $category_id3 = NULL;
            $parent_id = NULL;
            //checking if parent group is not empty and from api Group_Name3 is parent
            if (!empty($value->Group_Name3)) {
                $category_id2 = $this->create_category($value->Group_Name3, $category_id1);
                $parent_id = $category_id2;
            }
            //checking if sub category group is not empty and from api Group_Name3 is parent
            if (!empty($value->Group_Name2)) {
                $category_id3 = $this->create_category($value->Group_Name2, $category_id2);
                $parent_id = $category_id3;
            }
            if (!empty($value->Group_Name1)) {
                $parent_id = $this->create_category($value->Group_Name1, $category_id3);
            }

            $gst = 0;
            if (!empty($value->Group_Name4)) {
                $str = $value->Group_Name4;
                $pattern = "!\d+!";
                if (preg_match_all($pattern, $str, $matches)) {
                    $gst = $matches[0][0];
                }
            }

            $discount = 0;
            if (!empty($value->Group_Name5)) {
                $str = $value->Group_Name5;
                $pattern = "!\d+!";
                if (preg_match_all($pattern, $str, $matches)) {
                    $discount = $matches[0][0];
                }
            }

            //checking if product exist with slug if not then create new
            $product_check = Product::where(['slug' => Str::slug($value->ItemNameWithShade)])->first();

            if ($product_check == NULL) {
                $product = Product::create([
                    'parent_id'                     =>  $parent_id,
                    'brand_id'                      =>  $brand->id,
                    'item_name'                     =>  $value->ItemNameWOShade,
                    'item_shade_name'               =>  $value->ItemNameWithShade,
                    'slug'                          =>  Str::slug($value->ItemNameWithShade),
                    'brand_name'                    =>  $brand->name,
                    'main_cat_name'                 =>  !empty($value->Group_Name3) ? $value->Group_Name3 : NULL,
                    'cat_name'                      =>  !empty($value->Group_Name2) ? $value->Group_Name2 : NULL,
                    'sub_cat_name'                  =>  !empty($value->Group_Name1) ? $value->Group_Name1 : NULL,
                    'hsn'                           =>  $value->HSN_Code,
                    'gst'                           =>  $gst,
                    'short_description'             =>  $value->Item_Description,
                    'sku'                           =>  $value->UserCode,
                    'hex_code'                      =>  !empty($value->Addl_Item_Name) ? $value->Addl_Item_Name : NULL,
                    'p_type'                        =>  $value->Packing,
                    'variation'                     =>  $value->PackName,
                    'discount_type'                 =>  'percentage',
                    'discount'                      =>  $discount,
                    'regular_price'                 =>  $value->MRP,
                    'sale_price'                    =>  $value->MRP - ($value->MRP * $discount) / 100,
                    'lastmodifycode'                =>  $this->last_id,
                    'ecom'                          =>  !empty($value->Group_Short_Name28) ? $value->Group_Short_Name28 : NULL,
                    'status'                        => $value->InActive_For_SL === true ? 0 : 1,
                ]);
            }
        }
        dd("data save");
    }

    //Function to convert string to slug
    public function convertnametoslug($name)
    {
        $slug = strtolower($name);
        $slug = str_replace("-", " ", $slug);
        return $slug;
    }

    //Adding category old function
    public function addcategory($name, $parent_id)
    {
        $category_slug = $this->convertnametoslug($name);
        $category = Category::create([
            'name'          =>  $name,
            'slug'          =>  $category_slug,
            'parent_id'     =>  $parent_id,
        ]);

        return $category->id;
    }

    //Adding category new function
    public function create_category($category, $parent_id)
    {
        $category_id = NULL;
        $category_slug = $this->convertnametoslug($category);
        if (!empty(Category::where(['slug' => $category_slug])->first())) {
            $category_id = Category::where(['slug' => $category_slug])->first();
        } else {
            $category_id =
                Category::create([
                    'name'          =>  $category,
                    'slug'          =>  $category_slug,
                    'parent_id'     =>  $parent_id,
                ]);
        }
        return $category_id->id;
    }
}
