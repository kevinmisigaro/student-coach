<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'city_id', 'deadline_date','link'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function applicants(){
        return $this->belongsToMany(User::class,'applicants','job_id','user_id')->withPivot('accepted');
    }
}
