<?php
use Faker\Factory as Faker;

class RallyesTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        Rallye::create ( [
            'body'          => '<p>Au RestoRallye du 28 novembre en Hesbaye, on parlera sans conteste de cuisine, de bière, et... de produits du terroir, qui égayeront nos papilles, et nous entraînerons d\'une assiette à l\'autre, à la rencontre de passionnés.</p><p>Au menu: des rencontres inspirantes, des moments de rire et de convivialité.</p><p>Une nouvelle aventure culinaire vous attend!</p>',
            'date'          => '2014/12/01',
            'adress'        => 'Rue du château',
            'adress_number' => 22,
            'postal_code'   => 4280,
            'city'          => 'Blehen'
        ] );

        Rallye::create ( [
            'body'        => $faker->text (),
            'date'        => '2014/05/23',
            'adress'      => 'Place Saint-Lambert',
            'postal_code' => 4000,
            'city'        => 'Liège'
        ] );
    }

}
