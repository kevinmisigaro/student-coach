<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'user_id', 'public', 'image', 'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    public function userLikes(){
        return $this->belongsToMany(User::class,'post_likes','post_id','user_id')->withPivot('is_like');
    }
}
