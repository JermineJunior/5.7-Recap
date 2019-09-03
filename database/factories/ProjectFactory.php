<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'id' =>$faker->numberBetween(1,5),
        'user_id' => auth()->id(),
        'title' => $faker->word,
        'discription' => $faker->paragraph(2),
    ];
});
