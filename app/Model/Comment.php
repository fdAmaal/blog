<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Likes;
use App\Model\Post;

class Comment extends Model
{
    protected $fillable=['user_id','post_id','comment'];
    protected $with = ['user','likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->hasMany('App\Model\Like', 'comment_id', 'id');
    }

    public function likesNumber()
    {
        return $this->likes()->where('like', '=', 1);
    }

    public function disLikesNumber()
    {
        return $this->likes()->where('dislike', '=', 1);
    }


    // Good Article
    // https://laracasts.com/discuss/channels/eloquent/trying-to-get-a-post-with-comments-and-user-name
}
