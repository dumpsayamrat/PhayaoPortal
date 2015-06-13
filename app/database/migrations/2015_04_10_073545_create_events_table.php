<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->text('descropt');
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->string('img');
            $table->integer('type');// 1=univer,2=travel
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('events');
	}

}
