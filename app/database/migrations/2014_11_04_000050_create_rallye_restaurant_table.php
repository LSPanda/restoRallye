<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRallyeRestaurantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rallye_restaurant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rallye_id')->unsigned()->index();
			$table->foreign('rallye_id')->references('id')->on('rallyes')->onDelete('cascade');
			$table->integer('restaurant_id')->unsigned()->index();
			$table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->integer('menu_id')->unsigned()->index();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
		Schema::drop('rallye_restaurant');
	}

}
