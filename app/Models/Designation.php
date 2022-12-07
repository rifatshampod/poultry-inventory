<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' , 'responsibility' ,
    ];
    protected $guarded = ['id'];

    public function employee()
    {
    return $this->hasMany(Employee::class);
    }

    
}