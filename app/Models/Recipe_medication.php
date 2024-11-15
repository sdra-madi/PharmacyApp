<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Recipe_medication extends Pivot
{
    use HasFactory;
    protected $table='recipe_medications';
    protected $primary_key='id';
    protected $fillable = [
        'id',
        'id_recipe',
        'id_medication',
        'warehouse_price',
        'pharmacist_price',
        'expiry_date',
        'quantity',
    ];
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->using(Warehouse_detail::class);
    }
    public function orders1()
    {
        return $this->belongsToMany(Order::class)->using(Order_detail::class);
    }

}
