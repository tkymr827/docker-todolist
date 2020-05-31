<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todolist;
use Faker\Generator as Faker;

$factory->define(Todolist::class, function (Faker $faker) {
    return [
        //
        "taskname" => $faker->sentence(rand(1, 3)),
        "content" => $faker->realText(rand(10, 100)),
        "deadline" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "complite" => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '+30 years', $timezone = null),

        // "release" => $faker->randomElement($array = array("private", "public")),
        "release" => "public",
        // "release" => "private",

        "delete" => 0,
        // "delete" => $faker->randomElement($array = array("0", "1")),

        "name" => $faker->name(),
        // "name" => "takayama",

        "status" => $faker->randomElement($array = array("none", "bg-info", "bg-danger", "bg-success"))


    ];
});
