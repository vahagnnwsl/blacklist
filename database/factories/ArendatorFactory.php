<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Arendator;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
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

//     $first_name = $faker->firstName;
//     $last_name = $faker->lastName;
//     $patronymic = $faker->firstName;
//     $contact_phone = $faker->e164PhoneNumber;
//     $city = $faker->city;
//     $arr = [
//         'first_name' => $first_name,
//         'last_name' => $last_name ,
//         'type' => 1 ,
//         'user_id' => 6 ,
//         'patronymic' => $patronymic,
//         'contact_phone' => $contact_phone ,
//         'region' => $faker->state ,
//         'city' => $city ,
//         'register' => $faker->address ,
//         'passport_serial' => $faker->countryCode,
//         'passport_number' => rand(100000,2000000) ,
//         'birth_date' => date('Y-m-d H:m:s') ,
//
//     ];



    $first_name = $faker->firstName;
    $last_name = $faker->lastName;
    $patronymic = $faker->firstName;
    $contact_phone = $faker->e164PhoneNumber;
    $city = $faker->city;
    $arr = [
        'first_name' => $first_name,
        'last_name' => $last_name ,
        'company_name' => $faker->company,
        'inn' => rand(10000000,2222222222222),
        'type' => 2 ,
        'user_id' => 6 ,
        'patronymic' => $patronymic,
        'contact_phone' => $contact_phone ,
        'region' => $faker->state ,
        'city' => $city ,
        'address' => $faker->address ,
        'passport_serial' => $faker->countryCode,
        'passport_number' => rand(100000,2000000) ,

    ];



    $arr['search'] =  implode(" ",Arr::except($arr, ['user_id','type','birth_date']));


    return $arr;
});
