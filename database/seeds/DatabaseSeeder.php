<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded !');

        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories table seeded!');

        $this->call(PostsTableSeeder::class);
        $this->command->info('Posts table seeded!');

        $this->call(CommentsTableSeeder::class);
        $this->command->info('Comments table seeded!');

        Model::reguard();
    }
}
