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
        DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => '1',
                    'name' => 'Super Admin',
                    'email' => 'super_admin@blog.com',
                    'password' => Hash::make('password'),
                    'remember_token' => '',
                    'img' => 'images/posts/fw90AuDIuzw4dT5U44y20pU0fDILayHhReer811H.png',
                    'country' => 'Saudi Arabia',
                    'is_admin' => '1',
                    'ip_address' => request()->ip(),
                    'active' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),


            1 =>
                array (
                    'id' => '2',
                    'name' => 'Admin',
                    'email' => 'admin@blog.com',
                    'password' => Hash::make('password'),
                    'country' => 'Saudi Arabia',
                    'is_admin' => '1',
                    'active' => '1',
                    'img' => 'images/posts/HbeoMPRpocGjkZa15YZluvqTigMVneUu6rb6ossf.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),

            2 =>
                array (
                    'id' => '3',
                    'name' => 'Customer',
                    'email' => 'customer@blog.com',
                    'country' => 'Saudi Arabia',
                    'password' => Hash::make('password'),
                    'is_admin' => '0',
                    'active' => '1',
                    'img' => 'images/TLPZXmoRfxun9Wx28T1ISl6bFXgmX0Qv0t3u609P.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),


        ));
    }
}
