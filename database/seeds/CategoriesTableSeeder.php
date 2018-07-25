<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                "name"=>"Sport",
                "img"=>"images/5hWU2pl4rZJNlcMH7CsJWfVZccHBcDWONFCu7ufP.jpeg",
                "active"=>"1",
            ],
            [
                "name"=>"Lifestyle",
                "img"=>"images/aGUr0SQcWxsH6t7gyMUJFvG5yEpgpOsOApafUmRi.jpeg",
                "active"=>"1",
            ],
            [
                "name"=>"Economy",
                "img"=>"images/LcpxPHguhVl440rpJWtn5YHJvACLxT6v8pvmjTa9.jpeg",
                "active"=>"1",
            ],
            [
                "name"=>"Tourism",
                "img"=>"images/Vr3GsDdlFjafEPWzyHUsKXAwyfZU7lI9HWEmTDNN.jpeg",
                "active"=>"1",
            ],
        ];

        foreach ($categories as $key => $value) {

            \App\Model\Category::create($value);

        }

    }
}
