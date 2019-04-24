<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'weight' => $faker->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,20)
    ];
});
