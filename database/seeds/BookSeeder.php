<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newBook = new Book();
            $newBook->author_id = $faker->numberBetween(1, 10);
            $newBook->title = $faker->words(3, true);
            $newBook->image = $faker->imageUrl(640, 480);
            $newBook->creation_year = $faker->year();
            $newBook->description = $faker->paragraph(2);
            $newBook->save();
        }
    }
}
