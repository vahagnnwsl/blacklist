<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Arendator;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Arendator::class, function (Faker $faker) {

     $first_name = $faker->firstName;
     $last_name = $faker->lastName;
     $patronymic = $faker->firstName;
     $contact_phone = $faker->e164PhoneNumber;
     $city = $faker->city;

    $search = $first_name .' '.$last_name .' '.$patronymic.' '.$contact_phone  ;
    return [
        'first_name' => $first_name,
        'last_name' => $last_name ,
        'type' => 1 ,
        'patronymic' => $patronymic,
        'contact_phone' => $contact_phone ,
        'region' => $faker->state ,
        'city' => $city ,
        'register' => $faker->address ,
        'birth_date' => date('Y-m-d H:m:s') ,
        'search' => $search ,

    ];
});
