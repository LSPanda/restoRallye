<?php
use Faker\Factory as Faker;

class MenusTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );

        $menu1 = [
	        [
		        'name'    => 'Entrée froide',
		        'content' => [
			        'Foie gras de canard',
			        'Salade de saisons',
		        ]
	        ],
	        [
		        'name'    => 'Entrée chaude',
		        'content' => [
			        'Croquette de fromage sur son lit de laitue'
		        ]
	        ],
	        [
		        'name'    => 'Plat principal',
		        'content' => [
			        'Ours à la bière'
		        ]
	        ]
        ];
        $menu2 = [
	        [
		        'name'    => 'Entrée',
		        'content' => [
			        'Tomates crevettes',
		        ]
	        ],
	        [
		        'name'    => 'Plat principal',
		        'content' => [
			        'Escaloppe de dinde',
			        'Tournedos à l\'ancienne'
		        ]
	        ],
	        [
		        'name'    => 'Dessert',
		        'content' => [
			        'Crèpe Bretonne'
		        ]
	        ]
        ];
        $menu3 = [
	        [
		        'name'    => 'Entrée chaude',
		        'content' => [
			        'Scampis à l\'ail',
			        'Soupe du chef'
		        ]
	        ],
	        [
		        'name'    => 'Plat principal',
		        'content' => [
			        'Coquilles Saint-Jacque braisées'
		        ]
	        ],
	        [
		        'name'    => 'Dessert',
		        'content' => [
			        'Galettes maison et crème anglaise'
		        ]
	        ],
	        [
		        'name'    => 'Digestif',
		        'content' => [
			        'Vodka noisette',
			        'Café amaretto'
		        ]
	        ]
        ];

        Menu::create ( [
            'body' => Response::json ( $menu1 )
        ] );
        Menu::create ( [
            'body' => Response::json ( $menu2 )
        ] );
        Menu::create ( [
            'body' => Response::json ( $menu3 )
        ] );
    }

}
