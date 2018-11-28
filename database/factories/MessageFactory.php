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
    $models = config('novainbox.models');
    shuffle($models);

    $seenMember = $models[0] == config('novainbox.models.member')
        ? \Carbon\Carbon::now()
        : null;

    $seenAdmin = $models[0] == config('novainbox.models.admin')
        ? \Carbon\Carbon::now()
        : null;

    return [
        'thread_id' => \Bissolli\NovaInboxTool\Models\Thread::inRandomOrder()->first()->id,
        'sender_id' => (new $models[0]())->inRandomOrder()->first()->id,
        'sender_type' => $models[0],
        'body' => $faker->text(rand(100, 500)),
        'seen_by_member_at' => $seenMember,
        'seen_by_admin_at' => $seenAdmin,
    ];
});
