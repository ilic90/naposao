<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBussinessCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('business_cards', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('company_id')->unsigned();
            $table->string('main_activity', 100);
            $table->string('founded_in', 100);
            $table->string('locations', 100)->nullable();
            $table->integer('number_of_employees')->nullable();
            $table->string('benefits', 100)->nullable();
            $table->string('technologies', 100)->nullable();
            $table->string('office_out_country', 100)->nullable();
            $table->string('number_of_employees_bulgaria', 100)->nullable();
            $table->string('locations_bulgaria', 100)->nullable();
            $table->string('number_of_employees_worldwide', 100)->nullable();
            $table->string('locations_worldwide', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
