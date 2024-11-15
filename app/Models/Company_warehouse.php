<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_warehouses',
        'id_companies',
    ];
}
