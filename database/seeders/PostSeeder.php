<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Use Models

use App\Models\Post;

// Use Faker

use Faker\Generator as Faker;
use illuminate\Support\Str;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->unique()->sentence(4);
            Post::create([

                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $faker->paragraph(),
            ]);
        }
    }
}
