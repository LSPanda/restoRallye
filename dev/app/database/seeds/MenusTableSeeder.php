<?php
use Faker\Factory as Faker;

class MenusTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        $menu = [
            'name'    => 'Mon menu',
            'content' => [
                $faker->sentence (),
                $faker->sentence (),
                $faker->sentence ()
            ]
        ];
        Menu::create ( [
            'body' => Response::json ( $menu )
        ] );
    }

}
