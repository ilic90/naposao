<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('gender',6);
			$table->string('phone',100)->nullable();
			$table->rememberToken();
			$table->integer('image_id')->nullable();
			$table->integer('favorite_id')->nullable();
			$table->integer('is_applicant')->nullable();
			$table->integer('is_admin')->nullable();
			$table->string('token',100);
			$table->integer('active');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
