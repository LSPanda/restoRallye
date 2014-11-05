<?php
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        Post::create ( [
            'name'    => 'Qu\'est ce que le RestoRallye ?',
            'slug'    => 'what-is-restorallye',
            'body'    => $faker->text (),
            'type_id' => Type::whereName ( 'about-home' )->first ()->id
        ] );
    }

}
