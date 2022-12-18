<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_sector extends Model
{
    use HasFactory;

    protected $fillable = [
    'name' ,
    ];

    protected $guarded = ['id'];

    public function expense()
    {
    return $this->hasMany(Expense::class);
    }
}