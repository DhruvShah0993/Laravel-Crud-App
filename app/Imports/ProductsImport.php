<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Product([
            'prodname' => $row['prodname'],
            'details' => $row['details'],
            'price' => $row['price'],
            'image' => $row['image'],
            'cat_id' => $row['cat_id']
        ]);
    }
}
