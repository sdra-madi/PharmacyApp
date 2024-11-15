<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table='warehouses';
    protected $fillable = [
        'name',
        'name_ofresponse',
        'phone_number_call',
        'phone_number_land',
        'phone_number_whatsup',
        'worktime_from',
        'worktime_to',
        'workdayes',
        'city',
        'location_x',
        'location_y',
        'license_number',
        'photo',
        'password',

    ];
    protected $hidden = [

        'remember_token',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function recipe_medications()
    {
        return $this->belongsToMany(Recipe_medication::class)->using(Warehouse_detail::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class)->using(Favorite_warehouse::class);
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

}
