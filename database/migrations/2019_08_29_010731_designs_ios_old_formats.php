<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesignsIosOldFormats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('designs', static function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('designs', static function (Blueprint $table) {
            $table->string('ios_level', 20)->nullable()->after('bg_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designs', static function (Blueprint $table) {
            $table->dropColumn('ios_level');
        });
    }
}
