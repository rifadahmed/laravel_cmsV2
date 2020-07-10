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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'is_active'=>1,
        'role_id'=>1,
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'photo_id' => 1,
        'category_id' => $faker->numberBetween(1,3),
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraphs(rand(7,11),true),
        'slug'=>$faker->slug(),
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        
        'name' => $faker->randomElement(['admin','subs','author']),       
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        
        'name' => $faker->randomElement(['Programming','Entertainment','Politics']),       
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        
        'file' => 'men1.jpg',       
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        
        'post_id' => $faker->numberBetween(1,3), 
        'is_active' =>1,
        'user_id' =>$faker->numberBetween(1,9),
        'body' =>  $faker->paragraphs(rand(7,11),true),  
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        
        'comment_id' => $faker->numberBetween(1,3), 
        'is_active' =>1,
        'user_id' =>$faker->numberBetween(1,9),
        'body' =>  $faker->paragraphs(rand(7,11),true),  
        'created_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'updated_at'=>$faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});