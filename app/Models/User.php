<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio', 
        'role', 
        'phone', 
        'avatar', 
        'city', 'country','username', 'status', 'expertise'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function groupOwner(){
        $this->hasOne(Group::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class,'group_user','user_id','group_id');
    }

    public function events(){
        return $this->belongsToMany(Event::class,'event_attendees','user_id','event_id');
    }

    public function jobsApplied(){
        return $this->belongsToMany(Job::class,'applicants','user_id','job_id');
    }

    public function likes(){
        return $this->belongsToMany(Post::class,'post_likes','user_id','post_id');
    }

    public function followers(){
        return $this->hasMany(Follower::class);
    }

    public function isFollowing(){
        return $this->hasMany(Follower::class,'follower_id','id');
    }

    public function commentsLiked(){
        return $this->belongsToMany(Comment::class,'comment_likes','user_id','comment_id');
    }
}
