<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus_type extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' , 'description',
    ];

    protected $guarded = ['id'];
}