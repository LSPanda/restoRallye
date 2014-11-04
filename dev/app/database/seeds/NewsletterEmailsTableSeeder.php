<?php

use Faker\Factory as Faker;

class NewsletterEmailsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        foreach (range ( 1, 50 ) as $index)
        {
            NewsletterEmail::create ( [
                'email' => $faker->safeEmail
            ] );
        }
    }

}
