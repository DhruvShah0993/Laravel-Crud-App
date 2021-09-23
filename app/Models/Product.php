<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'prodname',
        'details',
        'price',
        'image',
        'cat_id',
    ];

    public static function getAllProducts()
    {
        $result = DB::table('products')
                    ->select('prodname', 'details', 'price', 'image', 'cat_id')
                    ->get()->toArray();
        return $result;
    }
}
