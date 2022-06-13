<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Faker\Generator as Faker;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 3; $i++) {

            $new_genre = new Genre();
            $new_genre->name = $faker->word();
            $new_genre->save();
        }
    }
}
