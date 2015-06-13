<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajorcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('majorcategories',function($table){
            $table->increments('id');
            $table->string('name');
            //FK
            $table->integer('user_categories_id')->unsigned();
            $table->foreign('user_categories_id')->references('id')->on('usercategories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropTfExists('majorcateries');
	}

}
