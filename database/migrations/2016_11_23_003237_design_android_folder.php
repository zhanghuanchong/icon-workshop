<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesignAndroidFolder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('designs', function($table) {
            $table->text('android_folder')->nullable()->after('bg_color');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('designs', function($table) {
            $table->dropColumn('android_folder');
        });
	}

}
