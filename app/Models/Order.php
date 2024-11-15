<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pharmacist',
        'id_warehouse',
        'id_company',
        'order_date',
        'isdelivered',
        'price_order',
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
    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class);
    }
    public function  warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function  company()
    {
        return $this->belongsTo(Company::class);
    }
    public function recip_medications()
    {
        return $this->belongsToMany(Recipe_medication::class)->using(Order_detail::class);
    }
    public function warehouse_details()
    {
        return $this->belongsToMany(Warehouse_detail::class)->using(Order_detail::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class);
    }
}
