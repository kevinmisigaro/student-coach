<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'event_date', 'event_time', 'image', 'location', 'description', 'link'
    ];

    public function attendees(){
        return $this->belongsToMany(User::class,'event_attendees','event_id','user_id');
    }
}
