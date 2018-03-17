<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designs', function($table){
            $table->string('id', 36);
            $table->string('file', 100);
            $table->string('ext', 20);
            $table->string('original_name', 200);
            $table->string('mime_type', 200);
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
		Schema::dropIfExists('designs');
	}

}
