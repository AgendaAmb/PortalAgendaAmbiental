<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSentFlagToUserWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_workshop', function (Blueprint $table) {
            $table->boolean('sent')->nullable()->default(false);
            $table->timestamp('sent_at')->nullable();
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
            $table->dropColumn('sent');
            $table->dropColumn('sent_at');
        });
    }
}
