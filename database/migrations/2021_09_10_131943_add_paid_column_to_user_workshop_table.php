<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidColumnToUserWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->dropColumn('quote_paid');
        });

        Schema::table('user_workshop', function (Blueprint $table) {
            $table->boolean('paid')->nullable();
            $table->timestamp('paid_at')->nullable();
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
            $table->dropColumn('paid');
            $table->dropColumn('paid_at');
        });

        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->boolean('quote_paid')->nullable()->default(false);
        });
    }
}
