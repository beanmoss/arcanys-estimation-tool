<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('projects', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->smallInteger('developer_number');
            $table->smallInteger('sprint_length');
            $table->smallInteger('workload_team_size_addition_per_dev');
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
        Schema::dropIfExists('projects');
	}

}
