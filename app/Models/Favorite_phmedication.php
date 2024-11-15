<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite_phmedication extends Model
{
    use HasFactory;
    protected $table='favorite_phmedications';
    protected $fillable = [
        'id',
        'favorite_id',
        'id_medication',
    ];

}
