<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Post;

class Category extends Model
{
    protected $fillable=['name','img','active'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
