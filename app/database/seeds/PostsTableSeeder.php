<?php
use Faker\Factory as Faker;
use App\Helpers\Slug as HelperSlug;

class PostsTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ();
        $slug  = new HelperSlug();

        Post::create ( [
            'name'    => 'Qu\'est ce que le RestoRallye ?',
            'slug'    => 'what-is-restorallye',
            'body'    => "<p>Le Resto Rallye, un itinéraire gourmand en trois restaurants</p><p>Pourquoi toujours se limiter à un seul restaurant pour déguster l’entièreté d’un menu ?</p><p>Le Resto Rallye offre la possibilité à ses « gastronomades » de faire connaissance, en une seule soirée, de plusieurs établissements d’une ville ainsi que de découvrir une nouvelle région de façon originale et ludique.</p><p>A l’instar d’un rallye automobile, les convives se réunissent dans un espace commun afin d’y déguster l’apéro et les mises en bouche. Chacun y reçoit le roadbook ; on trouve dans celui-ci un plan de la ville avec l’emplacement des restaurants, les bons donnant droit aux mets ainsi que l’itinéraire des restaurants proposés.</p><p>Ensuite, départ vers l’inconnu… Il faut expérimenter les papilles ! C’est la seule constante des étapes… La première halte est consacrée à la dégustation de l‘entrée froide, la deuxième à l’entrée chaude et la dernière au plat principal. Tous les Resto Rallyens se retrouvent ensuite pour savourer le dessert et le café dans le même endroit où ils ont pris l‘apéro et dans lequel ils peuvent échanger leurs avis sur leurs parcours respectifs.</p><p>Programme type de la soirée</p><p>18.30- 19.30 réception des Resto Rallyens au lieu d’accueil</p><p>19.30-19.45 déplacement des Resto Rallyens vers les différents restaurants</p><p>19.45-20.30 entrée froide</p><p>20.30-20.45 déplacement des Resto Rallyens vers les différents restaurants</p><p>20.45-21.30 entrée chaude</p><p>21.30-21.45	déplacement des Resto Rallyens vers les différents restaurants</p><p>21.45-22.30 plat principal</p><p>22.30-…	retour au lieu d’accueil pour café, pousse et dessert</p><p>Le tarif par participant s'élève à 60 €, ce prix comprend:</p><ul><li>L'apéro et ses zakouskis</li><li>L'entrée froide</li><li>L'entrée chaude</li><li>Le plat principal</li><li>Le café et son dessert</li><li>Le pousse-café</li><li>+ un verre de vin et d'eau dans chaque restaurant</li></ul>",
            'type_id' => Type::whereName ( 'about-home' )->first ()->id
        ] );

        foreach (range ( 1, 15 ) as $index)
        {
                Post::create ( [
                'name'    => $faker->sentence(),
                'slug'    => $slug->setSlugAttribute ( $faker->sentence(), new Post() ),
                'body'    => $faker->text(rand(300, 1000)),
                'type_id' => Type::whereName ( 'post' )->first ()->id
            ] );
        }
    }

}
