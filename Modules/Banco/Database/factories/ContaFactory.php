<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\Modules\Banco\Models\Conta::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'agencia' => rand(0, 10000),
        'dg_agencia' => rand(0, 9),
        'conta' => rand(0, 10000),
        'dg_conta' => rand(0, 9),
        'tipo' => rand(0, 1),
        'saldo' => rand(20000, 10000000),
    ];
});
