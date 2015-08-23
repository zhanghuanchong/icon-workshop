<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplashFolder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('splashes', function($table){
			$table->char('folder', 8)->after('id');
			$table->char('platform', 255)->after('folder');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('splashes', function($table){
			$table->dropColumn('folder');
			$table->dropColumn('platform');
		});
	}

}
