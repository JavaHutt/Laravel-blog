<?php

use Faker\Generator as Faker;
use App\Models\BlogPost;

$factory->define(BlogPost::class, function (Faker $faker) {
    $title       = $faker->sentence(mt_rand(3, 8), true);
    $txt         = $faker->realText(mt_rand(1000, 4000));
    $isPublished = mt_rand(1, 5) > 1;
    $date        = $faker->dateTimeBetween('-3 months', '-2 months');

    return [
        'category_id'  => mt_rand(1, 11),
        'user_id'      => mt_rand(1, 5) == 5 ? 1 : 2,
        'slug'         => str_slug($title),
        'title'        => $title,
        'excerpt'      => $faker->text(40, 100),
        'content_raw'  => $txt,
        'content_html' => $txt,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
        'created_at'   => $date,
        'updated_at'   => $date
    ];
});
