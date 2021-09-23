<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Order::getAllOrders());
    }

    public function headings():array
    {
        return [
            'Id',
            'User_id',
            'Prod_id',
            'Address',
            'Contact',
            'City_id',
            'Price',
            'Qty',
            'Total',
            'Status'
        ];
    }
}
