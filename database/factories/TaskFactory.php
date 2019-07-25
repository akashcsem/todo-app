<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
        'user_id' => mt_rand(1, 10),
        'status' => '0'
    ];
});
