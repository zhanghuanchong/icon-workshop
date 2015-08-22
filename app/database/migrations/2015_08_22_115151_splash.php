<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Splash extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('splashs', function($table) {
			$table->string('id', 36);
			$table->string('logo', 255)->nullable();
			$table->string('color', 6)->nullable();
			$table->string('bg', 255)->nullable();
			$table->string('orientation', 20)->default('portrait');
			$table->string('user_agent', 200)->nullable();
			$table->string('ip', 20)->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('splash');
	}

}
