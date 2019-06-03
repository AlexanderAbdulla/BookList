<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        /*
                    $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->timestamps();
        */
    ];
});
