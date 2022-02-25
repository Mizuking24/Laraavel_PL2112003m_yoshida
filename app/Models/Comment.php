<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];


    public function user() {
        return belongsTo('App\User');
    }
    public function post() {
        return belongsTo('App\Models\Post');
    }
}
