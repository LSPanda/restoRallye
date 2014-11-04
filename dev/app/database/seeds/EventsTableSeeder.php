<?php
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ();

        Event::create ( [
            'body'          => '<p>Au RestoRallye du 28 novembre en Hesbaye, on parlera sans conteste de cuisine, de bière, et... de produits du terroir, qui égayeront nos papilles, et nous entraînerons d\'une assiette à l\'autre, à la rencontre de passionnés.</p><p>Au menu: des rencontres inspirantes, des moments de rire et de convivialité.</p><p>Une nouvelle aventure culinaire vous attend!</p>',
            'date'          => $faker->dateTimeBetween('+1 month', '+3 months'),
            'adress'        => 'Rue du château',
            'adress_number' => 22,
            'postal_code'   => 4280,
            'city'          => 'Blehen'
        ] );

        Event::create ( [
            'body'        => $faker->text(),
            'date'        => $faker->dateTimeThisYear,
            'adress'      => 'Place Saint-Lambert',
            'postal_code' => 4000,
            'city'        => 'Liège'
        ] );
    }

}
