<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [

                'name' => 'Hero',
                'email' => 'hero@blogx.com',
                'password' => Hash::make('password'),
                'img' => 'images/posts/fw90AuDIuzw4dT5U44y20pU0fDILayHhReer811H.png',
                'country' => 'Saudi Arabia',
                'is_admin' => '1',
                'ip_address' => '172.0.0.1',
                'active' => '1'
            ],
            [

                'name' => 'Admin',
                'email' => 'admin@blogx.com',
                'password' => Hash::make('password'),
                'country' => 'Saudi Arabia',
                'is_admin' => '1',
                'ip_address' => '172.0.0.1',
                'active' => '1',
                'img' => 'images/posts/HbeoMPRpocGjkZa15YZluvqTigMVneUu6rb6ossf.png',
            ],
            [

                'name' => 'Customer',
                'email' => 'customer@blogx.com',
                'country' => 'Saudi Arabia',
                'password' => Hash::make('password'),
                'is_admin' => '0',
                'ip_address' => '172.0.0.1',
                'active' => '1',
                'img' => 'images/TLPZXmoRfxun9Wx28T1ISl6bFXgmX0Qv0t3u609P.png',
            ],


        ];

        foreach ($users as $key => $value) {

            \App\User::create($value);

        }

    }
}
