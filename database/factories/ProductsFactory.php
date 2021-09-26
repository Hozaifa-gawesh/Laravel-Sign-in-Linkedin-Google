<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categories;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Seller;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'seller_id' => Seller::where('confirmation_key', null)->get()->random()->id,
        'title' => $title,
        'slug' => slug($title),
        'sm_description' => $faker->text,
        'description' => $faker->text,
        'image' => 'uploads/products/2021072342911120112.jpg',
        'category_id' => Categories::whereIn('specialty', ['products', 'both'])->whereHide(0)->whereDeleted(0)->with('parents')->get()->random()->id,
        'brand_id' => Brands::whereHide(0)->whereDeleted(0)->get()->random()->id,
        'sku' =>  $faker->numberBetween(000000, 1000000),
        'price' =>  $faker->numberBetween(100, 10000),
        'quantity' =>  $faker->numberBetween(1, 100),
        'status' =>  'accepted',

    ];
});
