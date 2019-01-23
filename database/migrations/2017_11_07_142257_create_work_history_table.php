<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('position', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('company_website', 100)->nullable();
            $table->string('year_from', 100)->nullable();
            $table->string('month_from', 100)->nullable();
            $table->string('year_to', 100)->nullable();
            $table->string('month_to', 100)->nullable();
            $table->string('description', 4000)->nullable();
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
        Schema::dropIfExists('work_history');
    }
}
