<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('ad_id')->unsigned()->nullable();
			$table->integer('company_id')->unsigned()->nullable();
			$table->integer('notiffication')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('applications');
	}
}