<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'role_id'=>1,
            'active'=>1,
            'name' =>'Mr.Admin',
            'username'=>'admin',
            'email' =>'admin@sms.com',
            'password' => bcrypt('demo123'),
            'remember_token'=>str_random(10),
        ]);

        User::insert([
            'role_id'=>3,
            'active'=>1,
            'name' =>'Mr.Student',
            'username'=>'student',
            'email' =>'student@sms.com',
            'password' => bcrypt('demo123'),
            'remember_token'=>str_random(10),
        ]);
    }
}
