<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('description');
			$table->string('ad_type', 100);
			$table->string('ref_number', 100)->nullable();
			$table->string('job_type', 100);
			$table->string('term', 100)->nullable();
			$table->integer('company_id')->unsigned()->index();
			$table->string('career_level', 100)->nullable();
			$table->string('students', 100)->default('0');
			$table->string('low_experience', 100)->default('0');
			$table->string('country', 100);
			$table->string('city', 100);
			$table->string('salary_type', 100)->nullable();
			$table->string('salary_from', 100)->nullable();
			$table->string('salary_to', 100)->nullable();
			$table->string('currency', 50);
			$table->string('external_url', 100)->nullable();
			$table->string('position', 100);
			$table->integer('approved')->default('0');
			$table->integer('favorite_id')->nullable();
			$table->integer('company_type')->nullable();
			$table->integer('page_visits')->nullable();
			$table->timestamp('expiration_date');
			$table->boolean('confidential')->default(0);
			$table->timestamp('promotion_date')->nullable();
			$table->timestamp('reinforcement_date')->nullable();

			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
