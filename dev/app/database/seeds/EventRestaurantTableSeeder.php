<?php


class EventRestaurantTableSeeder extends Seeder {

    public function run () {
        // Getting the restos
        $resto[ 'tambouille' ]   = Restaurant::whereName ( 'La Tambouille' )->first ();
        $resto[ 'fallais_oser' ] = Restaurant::whereName ( 'Fallais-Oser' )->first ();
        $resto[ 'jeux2saveurs' ] = Restaurant::whereName ( 'Jeux2Saveurs' )->first ();
        $resto[ 'alPierino' ]    = Restaurant::whereName ( 'Al Pierino' )->first ();
        // Getting the menu
        $menu = Menu::all ()->first ();

        // Future event
        $event = Event::whereCity ( 'Blehen' )->first ();

        // Attach the restaurants
        $event->restaurants ()->attach ( $resto[ 'tambouille' ]->id, [ 'menu_id', $menu->id ] );
        $event->restaurants ()->attach ( $resto[ 'fallais_oser' ]->id, [ 'menu_id', $menu->id ] );
        $event->restaurants ()->attach ( $resto[ 'jeux2saveurs' ]->id, [ 'menu_id', $menu->id ] );

        // Past event
        $event = Event::whereCity ( 'Liège' )->first ();
        // Attach the restaurants
        $event->restaurants ()->attach ( $resto[ 'alPierino' ]->id, [ 'menu_id', $menu->id ] );
        $event->restaurants ()->attach ( $resto[ 'jeux2saveurs' ]->id, [ 'menu_id', $menu->id ] );
        $event->restaurants ()->attach ( $resto[ 'tambouille' ]->id, [ 'menu_id', $menu->id ] );
    }

}
