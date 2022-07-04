<?php

/** @var Factory $factory */

use App\Model;
use App\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'is_complete' => false,
    ];
});
