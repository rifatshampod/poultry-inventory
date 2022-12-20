<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

     protected $fillable = [
    'name' , 'usages',
    ];

    protected $guarded = ['id'];

    public function farmMedicine()
    {
    return $this->hasMany(Farm_medicine::class);
    }
}