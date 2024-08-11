<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'amount', 'balance_after', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    
}


