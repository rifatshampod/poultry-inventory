<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
    'weight' , 'daily_gain' , 'fcr', 'dfc','cfc',
    ];
    protected $guarded = ['id'];
}