<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total_cash extends Model
{
    use HasFactory;

     protected $fillable = [
    'farm_id' , 'amount' ,
    ];
    protected $guarded = ['id'];

    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }
}