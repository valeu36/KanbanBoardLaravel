<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use App\Classes\Constants;

$factory->define(Task::class, function (Faker $faker) {
    $random_task_status = mt_rand(1, 3);

    return [
        'title' => $faker->word,
        'description' => $faker->word,
        'owner' => $faker->name,
        'status' => Constants::TASK_STATUSES[$random_task_status],
    ];
});

