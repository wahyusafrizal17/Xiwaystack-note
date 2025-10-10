<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joki extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'photo_path',
        'domain',
        'price',
        'customer_name',
        'phone',
        'dp_amount',
        'bank_account_id',
        'status',
        'notes',
    ];

    public function getRemainingBalanceAttribute(): int
    {
        return max(0, (int) $this->price - (int) $this->dp_amount);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
