<?php
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        foreach (range ( 1, 10 ) as $index)
        {
            User::create ( [
                'login'         => $faker->userName,
                'password'      => Hash::make ( 'azerty' ),
                'email'         => $faker->safeEmail,
                'adress'        => $faker->streetName,
                'adress_number' => $faker->numberBetween ( 1, 500 ),
                'postal_code'   => $faker->randomNumber ( 4 ),
                'city'          => $faker->city,
                'role'          => 'u'
            ] );
        }

        User::create ( [
            'login'    => 'admin',
            'password' => Hash::make ( 'admin' ),
            'email'    => 'admin@admin.admin',
            'role'     => 'a'
        ] );
    }

}
