<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Organization;
use App\Skills;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Skills::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'name'          => $name,
        'slug'          => Str::slug($name),
        'description'   => $faker->paragraph,
        'organization'  => (\factory(Organization::class)->create())->code
    ];
});
