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
$factory->define(\Bissolli\NovaInboxTool\Models\Thread::class, function (Faker $faker) {


    $owner = config('novainbox.models');
    shuffle($owner);
    $owner = $owner[0];

    $member = config('novainbox.models.member');

    return [
        'owner_id' => (new $owner)->inRandomOrder()->first()->id,
        'owner_type' => $owner,

        'member_id' => (new $member)->inRandomOrder()->first()->id,

        'closed_at' => null,
        'closed_by_id' => null,
        'closed_by_type' => null,

        'subject' => $faker->sentence(rand(2, 4)),
        'body' => $faker->text(rand(100, 500)),
    ];
});

