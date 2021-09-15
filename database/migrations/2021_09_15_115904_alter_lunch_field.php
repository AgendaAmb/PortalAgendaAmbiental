<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLunchField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->dropColumn('lunch');
        });

        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->boolean('lunch')->default(0)->nullable();
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
            $table->dropColumn('lunch');
        });

        Schema::table('unirodada_users', function (Blueprint $table) {
            $table->string('lunch')->nullable();
        });
    }
}
