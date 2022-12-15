<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_chicken extends Model
{
    use HasFactory;

     protected $fillable = [
    'chicken_id' , 'date' , 'feed_consumption' , 'fcr', 'weight1' , 'weight2' , 'weight3' , 'weight4' , 'weight_avg' , 'mortality' , 'rejection', 'status',
    ];

    protected $guarded = ['id'];

    public function chicken()
    {
    return $this->belongsTo(Chicken::class);
    }
}