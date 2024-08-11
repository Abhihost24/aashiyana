<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }



    public function deposit($amount)
    {
        $this->balance += $amount;
        $this->save();

        $this->transactions()->create([
            'user_id' => $this->user_id,
            'type' => 'deposit',
            'amount' => $amount,
            'balance_after' => $this->balance,
            'status' => 'completed',
        ]);
    }

    public function withdraw($amount)
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->save();

            $this->transactions()->create([
                'user_id' => $this->user_id,
                'type' => 'withdrawal',
                'amount' => $amount,
                'balance_after' => $this->balance,
                'status' => 'completed',
            ]);
        } else {
            // Handle insufficient balance case
            throw new \Exception('Insufficient balance');
        }
    }

}
