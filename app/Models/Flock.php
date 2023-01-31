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

    public function chicken()
    {
    return $this->hasMany(Chicken::class);
    }
    public function expense()
    {
    return $this->hasMany(Expense::class);
    }
    public function sale()
    {
    return $this->hasMany(Sale::class);
    }
    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }
}