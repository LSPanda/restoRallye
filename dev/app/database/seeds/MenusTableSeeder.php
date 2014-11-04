<?php

class MenusTableSeeder extends Seeder {

    public function run () {
        $menu    = [
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
