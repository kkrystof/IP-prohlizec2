<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('key', function(Blueprint $table)
		{
			$table->integer('key_id', true);
			$table->integer('employee');
			$table->integer('room')->index('room');
			$table->unique(['employee','room'], 'employee_room');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('key');
	}

}
