<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee', function(Blueprint $table)
		{
			$table->integer('employee_id', true);
			$table->string('name');
			$table->string('surname');
			$table->string('job');
			$table->integer('wage');
			$table->integer('room')->index('room');
			$table->string('login')->unique()->nullable();
			$table->string('password')->nullable();
			$table->boolean('admin')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee');
	}

}
