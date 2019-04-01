<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DvdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dvds')->insert([
            'title' => Str::random(10),
            'description' => Str::random(25),
            'genre' => 'Genre',
            'ownerId' => 1,
        ]);

        DB::table('dvds')->insert([
            'title' => Str::random(10),
            'description' => Str::random(25),
            'genre' => 'Comedy',
            'ownerId' => 1,
        ]);

        DB::table('dvds')->insert([
            'title' => Str::random(10),
            'description' => Str::random(25),
            'genre' => 'Genre',
            'ownerId' => 1,
        ]);

        DB::table('dvds')->insert([
            'title' => Str::random(10),
            'description' => Str::random(25),
            'genre' => 'Genre',
            'ownerId' => 2,
        ]);

        DB::table('dvds')->insert([
            'title' => Str::random(10),
            'description' => Str::random(25),
            'genre' => 'Comedy',
            'ownerId' => 2,
        ]);
    }
}
