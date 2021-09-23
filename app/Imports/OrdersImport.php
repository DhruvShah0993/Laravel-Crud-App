<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'user_id' => $row['user_id'],
            'prod_id' => $row['prod_id'],
            'address' => $row['address'],
            'contact' => $row['contact'],
            'city_id' => $row['city_id'],
            'price' => $row['price'],
            'qty' => $row['qty'],
            'total' => $row['total'],
            'status' => $row['status'],
        ]);
    }
}
