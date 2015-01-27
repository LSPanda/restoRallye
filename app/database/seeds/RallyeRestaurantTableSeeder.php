<?php


class RallyeRestaurantTableSeeder extends Seeder {

    public function run () {
        // Getting the restos
        $resto[ 'tambouille' ]   = Restaurant::whereName ( 'La Tambouille' )->first ();
        $resto[ 'fallais_oser' ] = Restaurant::whereName ( 'Fallais-Oser' )->first ();
        $resto[ 'jeux2saveurs' ] = Restaurant::whereName ( 'Jeux2Saveurs' )->first ();
        $resto[ 'alPierino' ]    = Restaurant::whereName ( 'Al Pierino' )->first ();
        // Getting the menu
        $menus = Menu::all ();

        // Future rallye
        $rallye = Rallye::whereCity ( 'Blehen' )->first ();
        // Attach the restaurants
        $rallye->restaurants ()->attach ( $resto[ 'tambouille' ]->id, [ 'menu_id' => $menus[0]->id ] );
        $rallye->restaurants ()->attach ( $resto[ 'fallais_oser' ]->id, [ 'menu_id' => $menus[1]->id ] );
        $rallye->restaurants ()->attach ( $resto[ 'jeux2saveurs' ]->id, [ 'menu_id' => $menus[2]->id ] );

        // Past rallye
        $rallye = Rallye::whereCity ( 'Liège' )->first ();
        // Attach the restaurants
        $rallye->restaurants ()->attach ( $resto[ 'alPierino' ]->id, [ 'menu_id' => $menus[2]->id ] );
        $rallye->restaurants ()->attach ( $resto[ 'jeux2saveurs' ]->id, [ 'menu_id' => $menus[0]->id ] );
        $rallye->restaurants ()->attach ( $resto[ 'tambouille' ]->id, [ 'menu_id' => $menus[1]->id ] );
    }

}
