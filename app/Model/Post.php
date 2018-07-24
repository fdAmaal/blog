<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
use App\User;
use App\Model\Like;
use App\Model\Comment;
use App\Model\Category;

class Post extends Model
{

    use Taggable;

    protected $table = 'posts';

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }
}
