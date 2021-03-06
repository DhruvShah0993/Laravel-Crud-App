<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'checkout';

    protected $fillale = [
        'name',
        'address',
        'phone',
        'email',
    ];

}
