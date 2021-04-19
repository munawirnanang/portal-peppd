<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'category' => $faker->word(),
        'title' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'description' => $faker->paragraph(10),
        'title_picture' => $faker->imageUrl(),
        'text' => $faker->text(1000)
    ];
});
