<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    use HasFactory;

    protected $table = 'group_post';

    protected $fillable = [
        'group_id', 'post_id'
    ];
}
