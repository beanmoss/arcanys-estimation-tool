<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tasks', function($table)
        {
            $table->increments('id');
            $table->integer('user_story_id')->unsigned();
            $table->foreign('user_story_id')->references('id')->on('user_stories');
            $table->string('description');
            $table->float('fifty_estimate_hrs');
            $table->float('ninety_estimate_hrs');
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('tasks');
	}

}
