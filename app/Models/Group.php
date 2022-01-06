<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','user_id','image','active'];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function members(){
        return $this->belongsToMany(User::class);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
