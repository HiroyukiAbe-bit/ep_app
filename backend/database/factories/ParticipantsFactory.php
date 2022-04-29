<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Participants;
use Faker\Generator as Faker;

$factory->define(App\Models\Participants::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'line_id' => $faker->lexify($string = '??????'),
        'how_to_watch_id' => $faker->numberBetween($min = 1, $max = 3),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get())
    ];
});
