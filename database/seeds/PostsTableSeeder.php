<?php

use Illuminate\Database\Seeder;

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $date = $faker->dateTime();
            
            $newPost = new Post();
            $newPost->title = $faker->sentence(2);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->subtitle = $faker->sentence(10);
            $newPost->text = $faker->text(2500);
            $newPost->author = $faker->name();
            $newPost->created_at = $date;
            $newPost->updated_at = $date;
            $newPost->save();
        }
    }
}
