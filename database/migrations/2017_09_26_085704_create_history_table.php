<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryTable extends Migration {

	public function up()
	{
		Schema::create('history', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();
			$table->integer('ad_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('history');
	}
}