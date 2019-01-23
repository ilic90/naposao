<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cv_id')->unsigned()->index();
            $table->string('position', 100);
            $table->string('company_name', 100);
            $table->string('year_from', 20);
            $table->string('month_from', 20);
            $table->string('year_to', 20);
            $table->string('month_to', 20);
            $table->string('location', 100);
            $table->string('business_sector',200);
            $table->string('description', 4000)->nullable();
            $table->timestamps();

            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_histories');
    }
}
