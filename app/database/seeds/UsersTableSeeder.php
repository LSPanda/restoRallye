<?php
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create( 'fr_BE' );

		foreach ( range( 1, 10 ) as $index ) {
			User::create( [
				'password'    => Hash::make( 'azerty' ),
				'email'       => $faker->safeEmail,
				'adress'      => $faker->streetName . ' ' . $faker->numberBetween( 1, 500 ),
				'postal_code' => $faker->randomNumber( 4 ),
				'city'        => $faker->city,
				'name'        => $faker->lastName,
				'surname'     => $faker->firstName,
				'phone'       => $faker->phoneNumber,
				'role'        => 'u'
			] );
		}

		User::create( [
			'password' => Hash::make( 'admin' ),
			'email'    => 'admin@admin.admin',
			'name'     => 'admin',
			'surname'  => 'admin',
			'role'     => 'a'
		] );
	}
}
