<?php
use Faker\Factory as Faker;

class RestaurantsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        Restaurant::create ( [
            'name'          => 'La Tambouille',
            'body'          => $faker->text (),
            'adress'        => 'Place de la victoire',
            'adress_number' => 13,
            'postal_code'   => 6200,
            'city'          => 'Châtelet',
            'note'          => 3,
            'email'         => 'tambouille.chatelet@gmail.com',
            'website'       => 'http://www.tambouille.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Fallais-Oser',
            'body'          => $faker->text (),
            'adress'        => 'Rue Guillaume Boline',
            'adress_number' => 22,
            'postal_code'   => 4260,
            'city'          => 'Fallais',
            'note'          => 5,
            'email'         => 'bendenis55@gmail.com',
            'website'       => 'http://www.resto-fallais-oser.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Jeux2Saveurs',
            'body'          => '<p>Ils jouent avec les saveurs, ils jonglent avec les textures.
Simon et Mike associent leur créativité pour revisiter les richesses de notre patrimoine gastronomique et, à l’occasion, leur faire côtoyer des saveurs d’ailleurs.</p><p>Ces mariages de goûts tantôt simples, tantôt sophistiqués sont déclinés dans des menus ‘découverte’ qui respectent le rythme des saisons. Ils sont toujours réalisés avec des produits frais du marché ou des artisans locaux.</p><p>Pour permettre à chacun de partager leur complicité, Simon et Mike ne manquent pas d’idées. Ils ont opté pour des prix légers sans sacrifier leur exigence de qualité. Ils proposent également des services qui les feront entrer dans votre cuisine …ou vous dans la leur. Une belle façon de découvrir nos 2 cuisiniers créant leurs Jeux 2 Saveurs.</p><p>Venez au restaurant jeux 2 saveurs à braives entre Liège et Namur pour profiter d\'une cuisine gastronomique et créative..</p>',
            'adress'        => 'Chaussée de Tirlemont',
            'adress_number' => 2,
            'postal_code'   => 4260,
            'city'          => 'Braives',
            'note'          => 2,
            'tel'           => '0471681951',
            'website'       => 'http://gastronomiquejeux2saveurs.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Al Pierino',
            'body'          => "<p>Une atmosphère chaleureuse, une cuisine typiquement italienne</p><p>Gastronomie et vins italiens, comme en Italie !</p><p>Bienvenue sur le site du restaurant Al Pierino, situé le long de la Hoëgne, à Theux en région liégeoise.</p><p>Toute notre équipe vous y accueille depuis plus de 14 ans, dans une ambiance conviviale.</p><p>Nous accordons un soin méticuleux à l’accueil et au service.</p><p>Pour les petites comme  les grandes occasions, chaque détail est pris en compte pour que vous soyez comblés.</p><p>Découvrez les festins de notre restaurant !</p><p>Inspiré par ses racines italiennes, Angelo, le chef-propriétaire, fait de chaque repas une célébration de textures et de saveurs. La carte propose de savoureuses pâtes, des risottos crémeux, des fruits de mer frais, des coupes de viande sélectionnées avec soin et des ingrédients de saison…</p><p>Goûtez des recettes traditionnelles italiennes, composées avec des ingrédients de première qualité. Des artisans d’ici et d’Italie fournissent d’excellents produits au chef Angelo, qui les restructure avec passion.</p><p>Nous proposons une carte fraîche du jour et notre menu est réactualisé régulièrement.</p><p>Un bon repas ne pourrait être parfait qu’accompagné d’un vin. C’est pourquoi, nous en avons sélectionné d’excellents pour satisfaire vos papilles.</p><p>Al Pierino, c’est le lieu idéal pour passer d'agréables moments en tête-à-tête, pour un repas d'affaire ou pour souligner un événement important en groupe (possibilité d’ouverture exceptionnelle pour des événements particuliers : mariage baptême, réunion,…).</p><p>Nous organisons également des tables d’hôtes à partir de 10 personnes.</p>",
            'adress'        => 'Rue Bouxherie',
            'adress_number' => 5,
            'postal_code'   => 4910,
            'city'          => 'Theux',
            'note'          => 3,
            'email'         => 'info@alpierino.be',
            'website'       => 'http://www.alpierino.be/'
        ] );
    }

}
