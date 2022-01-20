<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function index()
    {
        $code = 106784;
        $data = $this->fetchdata($code);
        $data = json_decode($data);
        dd($data->GetData);
    }

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
                "GlobalModifyCode": '.$code.',
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
        if(!empty($data->GetData)){
            $this->storeData($data->GetData);
            $this->fetchdata($data->LastGlobalModifyCode);
        }else{
            $msg = "Data transfer complete";
            return $msg;
        }
    }

    public function storeData($data)
    {
        foreach($data as $key => $value){
            $brand_slug = $this->convertnametoslug($value->Comp_Name);

            $brand = Brand::create([
                'name'  =>  $value->Comp_Name,
                'slug'  =>  $brand_slug,
            ]);

            $category_id = '';

            if(!empty($value->Group_Name3)){
                $category_id = $this->addcategory($value->Group_Name3,$category_id);
            }

            if(!empty($value->Group_Name2)){
                $category_id = $this->addcategory($value->Group_Name2,$category_id);
            }

            if(!empty($value->Group_Name1)){
                $category_id = $this->addcategory($value->Group_Name1,$category_id);
            }

            $product = Product::create([

            ]);
        }
    }

    public function convertnametoslug($name)
    {
        $slug = strtolower($name);
        $slug = str_replace("-", " ", $slug);
        return $slug;
    }

    public function addcategory($name,$parent_id)
    {
        $category_slug = $this->convertnametoslug($name);
        $category = Category::create([
            'name'          =>  $name,
            'slug'          =>  $category_slug,
            'parent_id'     =>  $parent_id,
        ]);

        return $category->id;
    }
}
