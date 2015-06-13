<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiddlecategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('middlecategories',function($table){
            $table->increments('id');
            $table->string('name');
            //FK
            $table->integer('major_categories_id')->unsigned();
            $table->foreign('major_categories_id')->references('id')->on('majorcategories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('middlecategories');
	}

}
