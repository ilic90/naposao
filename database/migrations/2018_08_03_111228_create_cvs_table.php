<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title', 50);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email',100);
            $table->string('gender',50);
            $table->string('phone', 100)->nullable();
            $table->string('post_address')->nullable();
            $table->string('birthdate', 100)->nullable();
            $table->string('citizenship', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('city', 100);
            $table->text('computer_skills')->nullable();
            $table->text('skills')->nullable();
            $table->string('driving_licence');
            $table->string('native_language', 100);
            $table->string('foreign_languages', 200)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
}
