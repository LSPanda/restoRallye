<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        Eloquent::unguard ();

        $this->call ( 'TypesTableSeeder' );
        $this->call ( 'PostsTableSeeder' );
        $this->call ( 'RestaurantsTableSeeder' );
        $this->call ( 'EventsTableSeeder' );
        $this->call ( 'MenusTableSeeder' );
        $this->call ( 'EventRestaurantTableSeeder' );
        $this->call ( 'UsersTableSeeder' );
        $this->call ( 'EventUserTableSeeder' );
        $this->call ( 'CommentsTableSeeder' );
        $this->call ( 'NewsletterEmailsTableSeeder' );
    }

}
