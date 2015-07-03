<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gov',function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('ministry');
            $table->string('where');
            $table->string('contact');
            $table->string('link');
            $table->integer('frequency');
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
        Schema::dropIfExists('gov');
	}

}
