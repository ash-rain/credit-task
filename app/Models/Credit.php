<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public $interest = 0.079;

    protected $fillable = ['holder', 'sum', 'period'];

    public function getReturnAmountAttribute()
    {
        $years = $this->attributes['period'] / 12;
        $interest = $this->interest * ($this->attributes['sum'] / $years);
        $amount = $this->attributes['sum'] + $interest;
        return $amount;
    }

    public function getFeeAttribute()
    {
        $installment = $this->returnAmount / $this->attributes['period'];
        return round($installment, 2);
    }

    public function getRemainingAttribute()
    {
        $remaining = $this->returnAmount;
        foreach ($this->payments as $payment) {
            $remaining -= $payment->amount;
        }
        return round($remaining, 2);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
