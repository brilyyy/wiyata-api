<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HistoryBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'reference',
        'description',
        'status',
        'proof_withdraw'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
