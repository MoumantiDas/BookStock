<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_cat extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_cat_name',
    ];
}
