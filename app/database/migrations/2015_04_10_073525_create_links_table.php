<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('links',function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->text('descript');
            $table->string('img');
            //FK
            $table->integer('middle_categories_id')->unsigned();
            $table->foreign('middle_categories_id')->references('id')->on('middlecategories');
        });*/
        Schema::table('links', function($table)
        {
            //FK
            $table->integer('gov_id')->unsigned()->nullable();
            $table->foreign('gov_id')->references('id')->on('gov');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('links');
	}

}
