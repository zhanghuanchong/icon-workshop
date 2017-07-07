<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequirementStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('requirements', function (Blueprint $table) {
		    $table->dropColumn('valid');
		    $table->string('status')->default('new');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('requirements', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->boolean('valid')->default(false);
        });
	}

}
