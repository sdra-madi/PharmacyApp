<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $table='medications';
    protected $fillable = [
        'id',
        'id_company',
        'name',
        'classification',
        'classification_detail',
        'photo',
        'parcode',
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
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->using(Recipe_medication::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class)->using(Favorite_phmedication::class);
    }
}
