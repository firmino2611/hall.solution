<?php

use Faker\Generator as Faker;

$factory->define(App\Fornecedor::class, function (Faker $faker) {
    return [
        'nome' => $faker->company
    ];
});
