<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoritesTable extends Migration {

	public function up()
	{
		Schema::create('favorites', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();
			$table->integer('ad_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('favorites');
	}
}