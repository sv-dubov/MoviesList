<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $genres = Genre::select('id')->get();
        $last = count($genres) - 1;

        for ($i = 0; $i < 50; $i++) {
            $movie = Movie::create([
                'title' => $faker->realText(15),
                'poster' => $faker->image('public/storage/uploads/movies', 640, 480, null, false)
            ]);

            if (count($genres)) {
                $movie->genres()->attach($genres[rand(0, $last)]);
            }
        }
    }
}
