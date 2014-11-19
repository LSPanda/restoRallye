<?php

class TypesTableSeeder extends Seeder {

    public function run () {
        Type::create ( [
            'name' => 'about-home'
        ] );

        Type::create ( [
            'name' => 'post'
        ] );

        Type::create ( [
            'name' => 'newsletter'
        ] );
    }

}
