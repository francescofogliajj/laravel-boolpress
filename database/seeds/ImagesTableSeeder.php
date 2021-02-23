<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $newImage = new Image();
            $newImage->alt = $faker->sentence(3);
            $newImage->link = $faker->imageUrl(640, 480, 'technics');
            $newImage->caption = $faker->sentence(10);
            $newImage->save();
        }
    }
}
