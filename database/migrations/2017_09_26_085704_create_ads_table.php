<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('description');
			$table->string('ad_type', 100);
			$table->string('ref_number', 100)->nullable();
			$table->string('job_type', 100);
			$table->string('term', 100)->nullable();
			$table->string('company_id', 100);
			$table->string('career_level', 100)->nullable();
			$table->string('students', 100)->default('0');
			$table->string('low_experience', 100)->default('0');
			$table->string('country', 100);
			$table->string('city', 100);
			$table->string('salary_type', 100);
			$table->string('salary_from', 100);
			$table->string('salary_to', 100);
			$table->string('currency', 100);
			$table->string('foreign_languages', 500)->nullable();
			$table->string('questionnaire_id', 100);
			$table->string('external_url', 100)->nullable();
			$table->string('position', 100);
			$table->integer('approved')->default('0');
			$table->integer('favorite_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}