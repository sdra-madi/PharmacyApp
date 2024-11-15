<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_pharmacy',
        'phone_number',
        'city',
        'description',
        'location_x',
        'location_y',
        'license_number',
        'password',
        'code',

    ];
    protected $hidden = [

        'remember_token',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }
}
