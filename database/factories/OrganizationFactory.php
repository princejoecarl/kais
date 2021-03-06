<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Organization;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Organization::class, function (Faker $faker) {

    $name = $faker->company;
    return [
        'code'  => $faker->uuid,
        'name'  => $name,
        'slug'  => Str::slug($name),
        'about' => $faker->paragraph,
    ];
});
