<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'will@test.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'willtest@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
