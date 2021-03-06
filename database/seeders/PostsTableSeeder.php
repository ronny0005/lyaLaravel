<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $faker = \Faker\Factory::create();
        $listuser = User::all()->pluck('id')->toArray();
        $listCategories = Categories::all()->pluck('categoriesId')->toArray();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            $user = $faker->randomElement($listuser);
            $category = $faker->randomElement($listCategories);
            Posts::create([
                'title' =>  $faker->title,
                'description' => $faker->text,
                'authorId' => $user,
                'categoriesId' => $category,
            ]);
        }
    }
}
