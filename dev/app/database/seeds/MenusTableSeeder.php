<?php

class MenusTableSeeder extends Seeder {

    public function run () {
        Menu::create ( [
            'body' => Response::json ( [

            ] )
        ] );
    }

}
