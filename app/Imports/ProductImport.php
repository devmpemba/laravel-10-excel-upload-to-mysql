<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Product;


class ProductImport implements ToModel
{
   
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row[0],
            'buying_price' => $row[1],
            'selling_price' => $row[2],
            'quantity' => $row[3],
        ]);
    }
}
