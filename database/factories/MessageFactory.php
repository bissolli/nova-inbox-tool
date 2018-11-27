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

$factory->define(\Bissolli\NovaInboxTool\Models\Message::class, function (Faker $faker) {
    $models = [
        'App\User'
    ];

    shuffle($models);

    return [
        'message_thread_id' => \Bissolli\NovaInboxTool\Models\MessageThread::inRandomOrder()->first()->id,
        'sender_id' => (new $models[0]())->inRandomOrder()->first()->id,
        'sender_type' => $models[0],
        'body' => $faker->text(500),
        'seen_at' => null,
    ];
});
