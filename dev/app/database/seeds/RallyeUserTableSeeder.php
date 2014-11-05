<?php
use Faker\Factory as Faker;

class RallyeUserTableSeeder extends Seeder {

    public function run () {
        $faker = Faker::create ( 'fr_FR' );
        $i     = 0;

        // Getting the users
        $users = User::whereRole ('u')->get();

        // Getting the gifts
        $gifts = Gift::all ();

        // Future rallye
        $rallye = Rallye::whereCity ( 'Blehen' )->first ();
        // Attach the user
        foreach ($users as $user)
        {
            $rallye->users ()->attach ( $user->id, [ 'gift_id' => $gifts[$i++]->id ] );
        }

        // Past rallye
        $rallye = Rallye::whereCity ( 'Liège' )->first ();
        foreach ($users as $user)
        {
            $rallye->users ()->attach ( $user->id, [ 'gift_id' => $gifts[$i++]->id ] );
        }
    }
}
