<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
    'date' , 'farm_id' , 'house_id' , 'flock_id' , 'expense_type_id' , 'expense_sector_id' , 'amount' , 'paid_from' , 'approver' , 'reference'
    ];
    protected $guarded = ['id'];

    public function farm()
    {
    return $this->belongsTo(Farm::class);
    }

    public function house()
    {
    return $this->belongsTo(House::class);
    }

    public function flock()
    {
    return $this->belongsTo(Flock::class);
    }

    public function expenseType()
    {
    return $this->belongsTo(Expense_type::class);
    }

    public function expenseSector()
    {
    return $this->belongsTo(Expense_sector::class);
    }
}