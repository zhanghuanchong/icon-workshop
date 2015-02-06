<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('subscriptions', function($table){
            $table->increments('id');
            $table->string('mail', 200);
            $table->string('design_id', 36);
            $table->string('user_agent', 200)->nullable();
            $table->string('ip', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('subscriptions');
	}

}
