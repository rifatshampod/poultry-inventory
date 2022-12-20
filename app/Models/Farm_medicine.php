<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm_medicine extends Model
{
    use HasFactory;

    protected $fillable = [
    'date' , 'farm_id' , 'medicine_id' , 'amount' , 'price' ,
    ];
    protected $guarded = ['id'];

    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }

    public function medicine()
    {
    return $this->belongsTo(Medicine::class);
    }
}