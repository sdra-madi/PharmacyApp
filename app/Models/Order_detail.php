<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order_detail extends Pivot
{
    use HasFactory;
    protected $table='order_details';
    protected $fillable = [
        'id_order',
        'id_warehouse_detail',
        'id_recipe_medication',
        'quantity',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function  order()
    {
        return $this->belongsTo(Order::class);
    }
}
