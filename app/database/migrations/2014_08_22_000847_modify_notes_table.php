<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyNotesTable extends Migration {

	public function up()
	{
		Schema::table('notes', function(Blueprint $table)
		{
			$table->dateTime('when_created')->nullable();
			$table->dateTime('when_touched')->nullable();
			$table->date('when_issued')->nullable();
			$table->date('when_paid')->nullable();
		});
	}

	public function down()
	{
		Schema::table('notes', function(Blueprint $table)
		{
			$table->dropColumn('when_created', 'when_touched', 'when_issued', 'when_paid');
		});
	}

}
