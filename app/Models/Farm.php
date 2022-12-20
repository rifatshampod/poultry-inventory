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

    public function chicken()
    {
    return $this->hasMany(Chicken::class);
    }

    public function feed()
    {
    return $this->hasMany(Feed::class);
    }

    public function expense()
    {
    return $this->hasMany(Expense::class);
    }

    public function pettyCash()
    {
    return $this->hasMany(Pettycash::class);
    }

    public function totalCash()
    {
    return $this->hasMany(Total_cash::class);
    }

    public function totalFeed()
    {
    return $this->hasMany(Total_feed::class);
    }

    public function farmMedicine()
    {
    return $this->hasMany(Farm_medicine::class);
    }

    public function sale()
    {
    return $this->hasMany(Sale::class);
    }


}