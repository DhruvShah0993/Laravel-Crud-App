<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    use HasFactory;

    const PENDING = 0;
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'prod_id',
        'price',
        'total_amount',
        'qty',
    ];
}
