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
            'body'    => "<p>Le Resto Rallye, un itinéraire gourmand en trois restaurants</p><p>Pourquoi toujours se limiter à un seul restaurant pour déguster l’entièreté d’un menu ?</p><p>Le Resto Rallye offre la possibilité à ses « gastronomades » de faire connaissance, en une seule soirée, de plusieurs établissements d’une ville ainsi que de découvrir une nouvelle région de façon originale et ludique.</p><p>A l’instar d’un rallye automobile, les convives se réunissent dans un espace commun afin d’y déguster l’apéro et les mises en bouche. Chacun y reçoit le roadbook ; on trouve dans celui-ci un plan de la ville avec l’emplacement des restaurants, les bons donnant droit aux mets ainsi que l’itinéraire des restaurants proposés.</p><p>Ensuite, départ vers l’inconnu… Il faut expérimenter les papilles ! C’est la seule constante des étapes… La première halte est consacrée à la dégustation de l‘entrée froide, la deuxième à l’entrée chaude et la dernière au plat principal. Tous les Resto Rallyens se retrouvent ensuite pour savourer le dessert et le café dans le même endroit où ils ont pris l‘apéro et dans lequel ils peuvent échanger leurs avis sur leurs parcours respectifs.</p>",
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
