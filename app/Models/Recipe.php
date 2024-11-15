<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'created_date',

    ];
    public function medications()
    {
        return $this->belongsToMany(Medication::class)->using(Recipe_medication::class);
    }
}
