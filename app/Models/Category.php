<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'parent_id'
    ];
    public function subcategories(){
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
