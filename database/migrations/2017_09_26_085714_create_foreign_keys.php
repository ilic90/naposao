<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('cvs', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->foreign('ad_id')->references('id')->on('ads')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->foreign('ad_id')->references('id')->on('ads')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('history', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('history', function(Blueprint $table) {
			$table->foreign('ad_id')->references('id')->on('ads')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ad_category', function(Blueprint $table) {
			$table->foreign('ad_id')->references('id')->on('ads')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ad_category', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('cvs', function(Blueprint $table) {
			$table->dropForeign('cvs_user_id_foreign');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->dropForeign('images_user_id_foreign');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->dropForeign('images_company_id_foreign');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->dropForeign('applications_user_id_foreign');
		});
		Schema::table('applications', function(Blueprint $table) {
			$table->dropForeign('applications_ad_id_foreign');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->dropForeign('favorites_user_id_foreign');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->dropForeign('favorites_ad_id_foreign');
		});
		Schema::table('history', function(Blueprint $table) {
			$table->dropForeign('history_user_id_foreign');
		});
		Schema::table('history', function(Blueprint $table) {
			$table->dropForeign('history_ad_id_foreign');
		});
		Schema::table('ad_category', function(Blueprint $table) {
			$table->dropForeign('ad_category_ad_id_foreign');
		});
		Schema::table('ad_category', function(Blueprint $table) {
			$table->dropForeign('ad_category_category_id_foreign');
		});
	}
}