<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                "user_id"=>"1",
                "post_id"=>"1",
                "comment"=>"great!",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"3",
                "post_id"=>"1",
                "comment"=>"woow!",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                "user_id"=>"2",
                "post_id"=>"1",
                "comment"=>"great job!",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"2",
                "comment"=>"looks great!",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"2",
                "post_id"=>"2",
                "comment"=>"lets go there oneday",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"2",
                "comment"=>"wow wow wow",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"2",
                "comment"=>"greeeeeeeeeeeeaaaaaaaaaaaaaaaat",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"2",
                "comment"=>"no way",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"2",
                "comment"=>"im tired.",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                "user_id"=>"1",
                "post_id"=>"6",
                "comment"=>"im tired.",
                "active"=>"1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ];

        foreach ($comments as $key => $value) {

            \App\Model\Category::create($value);

        }
    }
}
