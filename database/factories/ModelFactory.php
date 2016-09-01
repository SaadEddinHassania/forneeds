<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Sector::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});
$factory->define(App\Models\ServiceProviderType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Models\ServiceType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Models\MarginalizedSituation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Models\LocationMeta::class, function (Faker\Generator $faker,$location_model) {
    return [
        "population"=>$faker->biasedNumberBetween(2,1000),
        "unemployment"=>$faker->biasedNumberBetween(2,1000),
        "poverty_lvl"=>$faker->biasedNumberBetween(2,1000),
        "model"=>$location_model
    ];
});
$factory->define(App\Models\Area::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});
$factory->define(App\Models\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,

    ];
});
$factory->define(App\Models\District::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,

    ];
});
$factory->define(App\Models\Street::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

