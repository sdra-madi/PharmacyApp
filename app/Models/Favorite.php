<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table='favorites';
    protected $fillable = [
        'id',
        'id_pharmacy',
    ];
    use HasFactory;
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacist::class);
    }
    public function  medications()
    {
        return $this->belongsToMany(Medication::class)->using(Favorite_phmedication::class);
    }
    public function  warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->using(Favorite_warehouse::class);
    }
}
