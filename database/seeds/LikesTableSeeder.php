<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [

            [
                'user_id' => '1',
                'comment_id' => '1',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '1',
                'like' => '1',
                'dislike' =>'0'
            ],   [
                'user_id' => '1',
                'comment_id' => '2',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '2',
                'like' => '0',
                'dislike' =>'1'
            ],
            [
                'user_id' => '1',
                'comment_id' => '2',
                'like' => '0',
                'dislike' =>'1'
            ],
            [
                'user_id' => '1',
                'comment_id' => '3',
                'like' => '0',
                'dislike' =>'1'
            ],
            [
                'user_id' => '1',
                'comment_id' => '3',
                'like' => '0',
                'dislike' =>'1'
            ],
            [
                'user_id' => '1',
                'comment_id' => '5',
                'like' => '0',
                'dislike' =>'1'
            ],
            [
                'user_id' => '1',
                'comment_id' => '5',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '5',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '5',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '6',
                'like' => '1',
                'dislike' =>'0'
            ],
            [
                'user_id' => '1',
                'comment_id' => '5',
                'like' => '1',
                'dislike' =>'0'
            ],



        ];

        foreach ($likes as $key => $value) {

            \App\Model\Like::create($value);

        }
    }
}
