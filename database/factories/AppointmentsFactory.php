<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {

            return [
                'title' => $faker -> word(),
                'description' => $faker -> sentence( 6,true),
                'pet_id' => $faker->numberBetween(1, 20)
            ];

});
