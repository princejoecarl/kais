<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Procedure;
use App\Skills;
use Faker\Generator as Faker;

$factory->define(Procedure::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'name'          => $name,
        'slug'          => Str::slug($name),
        'description'   => $faker->paragraph,
        'skill'         => (\factory(Skills::class)->create())->id
    ];
});
