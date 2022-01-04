<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id','sender_id', 'message','sender_is_read','reciever_is_read'
    ];

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function sender(){
        return $this->belongsTo(User::class,'sender_id','id');
    }
}
