<?php

use Viauco\Realtime\Tests\Stubs\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $f) {
    return [
        'name'  => $f->name,
        'email' => $f->safeEmail,
    ];
});
