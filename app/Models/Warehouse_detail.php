<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Warehouse_detail extends Pivot
{
    use HasFactory;
    protected $table='warehouse_details';
    protected $fillable = [
        'id',
        'id_recipe_medication',
        'id_warehouse',
        'quantity',
        'discount_type',
        'discount_per',
        'discount_num',
        'discount',
        'max_quantitytosell',
    ];
    public function orders2()
    {
        return $this->belongsToMany(Order::class)->using(Order_detail::class);
    }
}
