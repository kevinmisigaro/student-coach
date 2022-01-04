<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'country_id'
    ];

    public function universities(){
        return $this->hasMany(University::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
