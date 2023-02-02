<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Action',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Adventure',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Animated',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Comedy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Drama',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fantasy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Historical',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Horror',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Musical',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Noir',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Romance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Science',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Thriller',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Western',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        Genre::insert($data);
    }
}
