<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_ofresponse',
        'city',
        'worktime_from',
        'worktime_to',
        'workdayes',
        'phone_number',
        'location_x',
        'location_y',
        'license_number',
        'photo',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

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
    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class);
    }
}
