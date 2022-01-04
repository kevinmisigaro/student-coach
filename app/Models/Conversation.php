<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'coach_id', 'active'
    ];

    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function coach(){
        return $this->belongsTo(User::class, 'coach_id', 'id');
    }
}
