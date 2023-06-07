<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
    'farm_id' , 'house_id' , 'date', 'total_birds','total_weight','avg_weight','quality','total_price','avg_price','per_kg_price','customer','car_no','catching_slip','payment_method','branch', 'status',
    ];
    protected $guarded = ['id'];

    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }

    public function house()
    {
    return $this->belongsTo(House::class);
    }
    public function flock()
    {
    return $this->belongsTo(Flock::class);
    }
}