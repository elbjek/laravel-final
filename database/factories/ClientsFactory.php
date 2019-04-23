<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'client_name' => $faker->name,
        'client_lastname' => $faker->lastName,
//        'username' => $faker->userName,
        'email' => $faker->freeEmail,
        'phone_number' => $faker->phoneNumber,
        'pet_id' => $faker->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,20)
    ];
});
