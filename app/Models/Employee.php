<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' , 'phone' , 'address', 'designation_id', 'salary','nid','status',
    ];
    protected $guarded = ['id'];

    public function designation()
    {
    return $this->belongsTo(Designation::class);
    }

    public function leave()
    {
    return $this->hasMany(Leave::class);
    }
}