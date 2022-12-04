<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' , 'address' , 'phone',
    ];

    protected $guarded = ['id'];

    public function house()
    {
    return $this->hasMany(House::class);
    }
}