<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRallyesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rallyes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('body');
			$table->date('date');
			$table->string('adress');
			$table->integer('postal_code');
			$table->string('city');
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
		Schema::drop('rallyes');
	}

}
