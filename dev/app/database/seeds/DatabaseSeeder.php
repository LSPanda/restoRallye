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
        $this->call ( 'RallyesTableSeeder' );
        $this->call ( 'MenusTableSeeder' );
        $this->call ( 'RallyeRestaurantTableSeeder' );
        $this->call ( 'UsersTableSeeder' );
        $this->call ( 'RallyeUserTableSeeder' );
        $this->call ( 'CommentsTableSeeder' );
        $this->call ( 'NewsletterEmailsTableSeeder' );
    }

}
