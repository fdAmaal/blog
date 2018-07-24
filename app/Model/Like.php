<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Comment;

class Like extends Model
{
    protected $fillable=['user_id','comment_id','like','dislike'];
    protected $with = ['user'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
