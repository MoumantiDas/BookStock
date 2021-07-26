<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emp1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email','salary','phone','department'
    ];
}
