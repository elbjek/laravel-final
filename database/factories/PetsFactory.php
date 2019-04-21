<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
//        'gender' => shuffle(size('male','female')),
//        'size' => $faker->randomElements($sizeValues = array ('small','medium','large'), $count = 1),
        'weight' => $faker->numberBetween(1,20),
        'client_id' => $faker->numberBetween(1, 20)
    ];
});
