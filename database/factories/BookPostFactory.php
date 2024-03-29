<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\App\Models\BookPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublish = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'category_id'   => rand(1 ,4),
        'user_id'       => (rand(1, 5) == 5) ? 1 : 2,
        'title'         => $title,
        'slug'          => Str::slug($title),
        'excerpt'       => $faker->text(rand(40, 100)),
        'content_raw'   => $txt,
        'content_html'  => $txt,
        'is_published'  => $isPublish,
        'published_at'  => $isPublish ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
        'price'         => rand(100, 2000),
        'created_at'    => $createdAt,
        'updated_at'    => $createdAt,
    ];

    return $data;
});
