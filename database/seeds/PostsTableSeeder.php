<?php

use Illuminate\Database\Seeder;

use App\Post;
use Faker\Generator as Faker;

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
            $date = $faker->datetime();
            
            $post = new Post();
            $post->title = $faker->sentence(2);
            $post->subtitle = $faker->sentence(10);
            $post->text = $faker->text(2500);
            $post->author = $faker->name();
            $post->created_at = $date;
            $post->updated_at = $date;
            $post->save();
        }
    }
}
