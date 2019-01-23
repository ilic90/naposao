<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('company_id');
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('email',150);
            $table->string('city',150);
            $table->string('state',150);
            $table->string('zip',100);
            $table->string('state_number',100);
            $table->string('phone',100);
            $table->string('address',150);
            $table->string('package',100);
            $table->string('amount',40);
            $table->string('tax',40);
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
        Schema::dropIfExists('invoices');
    }
}
