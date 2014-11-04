<?php

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ();

        Post::create ( [
            'name' => 'Qu\'est ce que le RestoRallye ?',
            'body' => $faker->text (),
            'type_id' => Type::whereName('about-home')->first()->id
        ] );
    }

}
