<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesignRadiusField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('designs', function (Blueprint $table) {
		    $table->float('radius')->default(0)->nullable()->after('android_folder');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('designs', function (Blueprint $table) {
            $table->dropColumn('radius');
        });
	}

}
