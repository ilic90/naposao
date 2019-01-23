<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	public function up()
	{
		Schema::create('images', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('company_id')->unsigned()->nullable();
			$table->string('path', 250);
		});
	}

	public function down()
	{
		Schema::drop('images');
	}
}