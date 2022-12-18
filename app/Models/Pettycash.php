<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pettycash extends Model
{
    use HasFactory;

    protected $fillable = [
    'date' , 'farm_id' , 'amount' ,
    ];
    protected $guarded = ['id'];

    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }
}