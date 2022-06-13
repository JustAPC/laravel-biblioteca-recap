<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_author = new Author();

            $new_author->name = $faker->firstNameMale();
            $new_author->last_name = $faker->lastName();
            $new_author->life_story = $faker->sentence();
            $new_author->author_year = $faker->date('Y');

            $new_author->save();
        }
    }
}
