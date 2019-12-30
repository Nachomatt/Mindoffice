<?php

use Faker\Generator as Faker;
use App\Role;
$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'guard_name'=> 'web',
    ];
});
