<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $discount = 0;
        if (!empty($row[13])) {
            $str = $row[13];
            $pattern = "!\d+!";
            if (preg_match_all($pattern, $str, $matches)) {
                $discount = $matches[0][0];
            }
        }

        $gst = 0;
        if (!empty($row[7])) {
            $str = $row[7];
            $pattern = "!\d+!";
            if (preg_match_all($pattern, $str, $matches)) {
                $gst = $matches[0][0];
            }
        }

        return new Product([
            'item_name'                     =>  $row[0],
            'item_shade_name'               =>  $row[1],
            'slug'                          =>  $this->convertnametoslug($row[1]),
            'brand_name'                    =>  $row[2],
            'main_cat_name'                 =>  $row[3],
            'cat_name'                      =>  $row[4],
            'sub_cat_name'                  =>  $row[5],
            'hsn'                           =>  $row[6],
            'gst'                           =>  $gst,
            'short_description'             =>  $row[8],
            'sku'                           =>  $row[9],
            'hex_code'                      =>  $row[10],
            'p_type'                        =>  $row[11],
            'variation'                     =>  $row[12],
            'discount_type'                 =>  'percentage',
            'discount'                      =>  $discount,
            'regular_price'                 =>  $row[14],
            'sale_price'                    =>  $row[14] - ($row[14] * $discount) / 100,
            'lastmodifycode'                =>  $row[15],
            'ecom'                          =>  $row[16]
        ]);
    }

    public function convertnametoslug($name)
    {
        $slug = strtolower($name);
        $slug = str_replace(" ", "-", $slug);
        return $slug;
    }
}
