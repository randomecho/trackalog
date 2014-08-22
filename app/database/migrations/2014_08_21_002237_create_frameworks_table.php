<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameworksTable extends Migration {

	public function up()
	{
		Schema::create('frameworks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
		});
	}

	public function down()
	{
		Schema::drop('frameworks');
	}

}
