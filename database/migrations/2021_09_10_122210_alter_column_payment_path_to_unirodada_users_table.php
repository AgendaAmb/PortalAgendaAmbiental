<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnPaymentPathToUnirodadaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->dropColumn('payment_receipt_path');
            $table->boolean('quote_paid')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->dropColumn('quote_paid');
            $table->string('payment_receipt_path')->nullable();
        });
    }
}
