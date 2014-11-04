<?php


class EventRestaurantTableSeeder extends Seeder {

    public function run () {
        // Future event
        $event = Event::whereCity ( 'Blehen' )->first();
        // Atach the restaurants
        $event->restaurants()->attach(Restaurant::whereName('La Tambouille')->first()->id);
        $event->restaurants()->attach(Restaurant::whereName('Fallais-Oser')->first()->id);
        $event->restaurants()->attach(Restaurant::whereName('Jeux2Saveurs')->first()->id);
        // Atach the menus
        $event->restaurants()->attach(Restaurant::whereName('Jeux2Saveurs')->first()->id);

        // Past event
        $event = Event::whereCity ( 'Liège' )->first();
        // Atach the restaurants
        $event->restaurants()->attach(Restaurant::whereName('Al Pierino')->first()->id);
        $event->restaurants()->attach(Restaurant::whereName('Jeux2Saveurs')->first()->id);
        $event->restaurants()->attach(Restaurant::whereName('La Tambouille')->first()->id);
        // Atach the menus

    }

}
