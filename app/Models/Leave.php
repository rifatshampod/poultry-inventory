<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
    'employee_id' , 'from' , 'to', 'duration', 'reason', 
    ];
    protected $guarded = ['id'];

    public function employee()
    {
    return $this->belongsTo(Employee::class);
    }
}