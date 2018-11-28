<?php

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
$factory->define(\Bissolli\NovaInboxTool\Models\MessageThread::class, function (Faker $faker) {
    return [
        'member_id' => \App\User::inRandomOrder()->first()->id,
        'subject' => $faker->sentence(4),
        'body' => $faker->text(500)
    ];
});
