<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use softDeletes;
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'prod_id',
        'address',
        'contact',
        'city_id',
        'price',
        'qty',
        'total',
        'status',
    ];
}
