<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    use HasFactory;

    protected $fillable = [
    'farm_id' , 'house_id' , 'flock_id', 'date' , 'sum_of_doc' , 'hatchery', 'bird_in_case' , 'vaccine' , 'density', 'catching_start' , 'catching_end' , 'status',
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

    public function dailyChicken()
    {
    return $this->hasMany(Daily_chicken::class);
    }
}