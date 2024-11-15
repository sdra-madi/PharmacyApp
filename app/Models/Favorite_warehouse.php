<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite_warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'favorite_id',
        'id_warehouse',
    ];
}
