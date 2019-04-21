<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->freeEmail,
        'phone_number' => $faker->phoneNumber
    ];
});
