<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@dev.tmh.com',
            'password' => bcrypt('123456'), // password
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'expert',
            'email' => 'doandaitien260898@gmail.com',
            'password' => bcrypt('123456'), // password
            'role' => 'expert'
        ]);

        DB::table('users')->insert([
            'username' => 'lecturer',
            'email' => 'tiendd@tmh-techlab.vn',
            'password' => bcrypt('123456'), // password
            'role' => 'lecturer'
        ]);

        DB::table('users')->insert([
            'username' => '20166827',
            'email' => 'tien.dd166827@sis.hust.edu.vn',
            'password' => bcrypt('123456'), // password
            'role' => 'student'
        ]);
    }
}
