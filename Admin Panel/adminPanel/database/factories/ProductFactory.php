<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(1),
        'amount'=> $faker->randomDigitNotNull(5, true),
        'productImg' => $faker->imageUrl(640, 480, 'animals', true)
    ];
});
