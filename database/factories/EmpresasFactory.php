<?php

use Faker\Generator as Faker;


$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'resumo' => $faker->text,
        'documento' => $faker->regexify('^([0-9]){2}\.([0-9]){3}\.([0-9]){3}\/([0-9]){4}\-([0-9]){2}$'),
        'pessoa' => $faker->randomElement(array('fisica', 'juridica'))
    ];
});
