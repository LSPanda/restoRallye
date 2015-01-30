<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users',
		function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'email' )->unique();
			$table->string( 'password' );
			$table->string( 'name' );
			$table->string( 'surname' );
			$table->string( 'phone' );
			$table->string( 'gsm' );
			$table->string( 'adress' );
			$table->integer( 'postal_code' );
			$table->string( 'city' );
			$table->string( 'role' )->default( 'u' );
			$table->rememberToken();
			$table->timestamps();
		} );
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'users' );
	}

}
