<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {
    return [
        'title' => $faker->titleFemale,
        'genre' => 'pop',
        'artist' => $faker->firstName
    ];
});
