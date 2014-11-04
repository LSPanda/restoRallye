<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('login')-> unique();
			$table->string('email')-> unique();
			$table->string('password', 60);
			$table->string('adress');
			$table->integer('adress_number');
			$table->integer('postal_code', 4);
			$table->string('role', 1)->default('a');
			$table->string('city');
            $table->rememberToken();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
