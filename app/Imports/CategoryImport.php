<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::where('sku', $row[0])->first();
        $product->hex_code = $row[1];
        $product->description = $row[2];
        $product->p_type = $row[3];
        $product->update();

        return $product;
    }
}
