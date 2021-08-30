<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssitedToWorkshopField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_workshop', function (Blueprint $table) {
            $table->boolean('assisted_to_workshop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_workshop', function (Blueprint $table) {
            $table->dropColumn('assisted_to_workshop');
        });
    }
}
