<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('key', function(Blueprint $table)
		{
			$table->foreign('employee', 'key_ibfk_1')->references('employee_id')->on('employee')->onUpdate('NO ACTION')->onDelete('cascade');
			$table->foreign('room', 'key_ibfk_2')->references('room_id')->on('room')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('key', function(Blueprint $table)
		{
			$table->dropForeign('key_ibfk_1');
			$table->dropForeign('key_ibfk_2');
		});
	}

}
