<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flock extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' , 'start_date' , 'end_date', 'status',
    ];

    protected $guarded = ['id'];
}