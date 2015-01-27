<?php
use Faker\Factory as Faker;

class RestaurantsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        Restaurant::create ( [
            'name'          => 'La Tambouille',
            'slug'          => Str::slug('La Tambouille'),
            'body'          => '<p>Ne vous fiez pas au nom de cet établissement ! Loin de proposer une cuisine de cantine, le chef vous servira des plats mettant en valeur les produits du terroir. Ici, pas de gastronomie de haute voltige mais des mets simples et délicieux. Le maître-mot du chef : qualité. N’hésitez pas à goûter les spécialités de la maison : bœuf irlandais, langue d’agneau, joues de porc, l’importante variété de croquettes et les moules en saison.</p><p>Quoi de mieux qu’une balade pour faciliter la digestion ? Le centre-ville de Châtelet accueille une promenade Magritte, vous y trouverez des lampadaires couverts de chapeaux melons en hommage à l’adolescence hennuyère du peintre surréaliste.</p>',
            'adress'        => 'Place de la victoire 13',
            'postal_code'   => 6200,
            'city'          => 'Châtelet',
            'note'          => 3,
            'email'         => 'tambouille.chatelet@gmail.com',
            'website'       => 'http://www.tambouille.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Fallais-Oser',
            'slug'          => Str::slug('Fallais-Oser'),
            'body'          => '<p>Restaurant situé dans le parc naturel des vallées de la Burdinale et de la Mehaigne au milieu du joli village de Fallais, vous y trouverez une gastronomie où les produits locaux et du terroir sont mis en valeur.</p><p>J\'ai choisi de travailler avec les artisans locaux et leurs produits car en discutant avec les habitants de notre belle région, j\'ai constaté le besoin d\'un retour aux sources.</p><p>Le restaurant est ouvert sur réservation uniquement le vendredi et samedi soir, le dimanche midi et les jours fériés mais également pour les groupes en semaine.</p>',
            'adress'        => 'Rue Guillaume Boline 22',
            'postal_code'   => 4260,
            'city'          => 'Fallais',
            'note'          => 5,
            'email'         => 'bendenis55@gmail.com',
            'website'       => 'http://www.resto-fallais-oser.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Jeux2Saveurs',
            'slug'          => Str::slug('Jeux2Saveurs'),
            'body'          => '<p>Ils jouent avec les saveurs, ils jonglent avec les textures.
Simon et Mike associent leur créativité pour revisiter les richesses de notre patrimoine gastronomique et, à l’occasion, leur faire côtoyer des saveurs d’ailleurs.</p><p>Ces mariages de goûts tantôt simples, tantôt sophistiqués sont déclinés dans des menus ‘découverte’ qui respectent le rythme des saisons. Ils sont toujours réalisés avec des produits frais du marché ou des artisans locaux.</p><p>Pour permettre à chacun de partager leur complicité, Simon et Mike ne manquent pas d’idées. Ils ont opté pour des prix légers sans sacrifier leur exigence de qualité. Ils proposent également des services qui les feront entrer dans votre cuisine …ou vous dans la leur. Une belle façon de découvrir nos 2 cuisiniers créant leurs Jeux 2 Saveurs.</p><p>Venez au restaurant jeux 2 saveurs à braives entre Liège et Namur pour profiter d\'une cuisine gastronomique et créative..</p>',
            'adress'        => 'Chaussée de Tirlemont 2',
            'postal_code'   => 4260,
            'city'          => 'Braives',
            'note'          => 2,
            'tel'           => '0471681951',
            'website'       => 'http://gastronomiquejeux2saveurs.be/'
        ] );
        Restaurant::create ( [
            'name'          => 'Al Pierino',
            'slug'          => Str::slug('Al Pierino'),
            'body'          => "<p>Une atmosphère chaleureuse, une cuisine typiquement italienne</p><p>Gastronomie et vins italiens, comme en Italie !</p><p>Bienvenue sur le site du restaurant Al Pierino, situé le long de la Hoëgne, à Theux en région liégeoise.</p><p>Toute notre équipe vous y accueille depuis plus de 14 ans, dans une ambiance conviviale.</p><p>Nous accordons un soin méticuleux à l’accueil et au service.</p><p>Pour les petites comme  les grandes occasions, chaque détail est pris en compte pour que vous soyez comblés.</p><p>Découvrez les festins de notre restaurant !</p><p>Inspiré par ses racines italiennes, Angelo, le chef-propriétaire, fait de chaque repas une célébration de textures et de saveurs. La carte propose de savoureuses pâtes, des risottos crémeux, des fruits de mer frais, des coupes de viande sélectionnées avec soin et des ingrédients de saison…</p><p>Goûtez des recettes traditionnelles italiennes, composées avec des ingrédients de première qualité. Des artisans d’ici et d’Italie fournissent d’excellents produits au chef Angelo, qui les restructure avec passion.</p><p>Nous proposons une carte fraîche du jour et notre menu est réactualisé régulièrement.</p><p>Un bon repas ne pourrait être parfait qu’accompagné d’un vin. C’est pourquoi, nous en avons sélectionné d’excellents pour satisfaire vos papilles.</p><p>Al Pierino, c’est le lieu idéal pour passer d'agréables moments en tête-à-tête, pour un repas d'affaire ou pour souligner un événement important en groupe (possibilité d’ouverture exceptionnelle pour des événements particuliers : mariage baptême, réunion,…).</p><p>Nous organisons également des tables d’hôtes à partir de 10 personnes.</p>",
            'adress'        => 'Rue Bouxherie 5',
            'postal_code'   => 4910,
            'city'          => 'Theux',
            'note'          => 3,
            'email'         => 'info@alpierino.be',
            'website'       => 'http://www.alpierino.be/'
        ] );
    }

}
