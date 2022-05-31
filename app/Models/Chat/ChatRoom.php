<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id'
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function latest_message()
    {
        return $this->hasOne(ChatMessage::class)->latest();
    }

    public function unread_messages()
    {
        return $this->hasMany(ChatMessage::class)->where('receiver_id', Auth::id())->where('read', 0);
    }
}
