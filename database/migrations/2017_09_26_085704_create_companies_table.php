<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('company_name', 100);
			$table->string('country', 100);
			$table->integer('blocked')->default('0');
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('register_type', 100);
			$table->string('pib', 100);
			$table->string('foreign_name', 100);
			$table->string('company_type', 100);
			$table->string('vat', 100)->nullable();
			$table->string('sector', 100);
			$table->string('company_registered_office', 100);
			$table->string('company_website', 500);
			$table->string('company_phone', 100);
			$table->string('company_address', 100);
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('position', 100);
			$table->string('about_us', 3000)->nullable();
			$table->string('business_phone', 100);
			$table->string('business_email', 100);
			$table->string('newsletter', 100)->default('0');
			$table->string('username', 100);
			$table->string('authorized_person', 100)->default('0');
			$table->string('manager_first_name', 100)->nullable();
			$table->string('manager_last_name', 100)->nullable();
			$table->string('manager_position', 100)->nullable();
			$table->string('manager_phone', 100)->nullable();
			$table->string('manager_email', 100)->nullable();
			$table->string('administrative_contact_first_name', 100)->nullable();
			$table->string('administrative_contact_last_name', 100)->nullable();
			$table->string('administrative_contact_position', 100)->nullable();
			$table->string('administrative_contact_business_phone', 100)->nullable();
			$table->string('administrative_contact_business_email', 100)->nullable();
			$table->double('balance',8,2)->default('0');
			$table->text('career')->nullable();
			$table->tinyInteger('active')->default('0');
			$table->timestamp('promotion')->nullable();
			$table->string('token',100);
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}