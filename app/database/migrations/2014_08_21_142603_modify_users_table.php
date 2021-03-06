<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration {

	public function up()
	{
		Schema::table('notes', function(Blueprint $table)
		{
			$table->renameColumn('project', 'project_id');
			$table->renameColumn('framework', 'framework_id');
		});
	}

	public function down()
	{
		Schema::table('notes', function(Blueprint $table)
		{
			$table->renameColumn('project_id', 'project');
			$table->renameColumn('framework_id', 'framework');
		});
	}

}
