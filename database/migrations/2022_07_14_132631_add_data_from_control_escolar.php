<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataFromControlEscolar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birth_state')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('marital_state')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('residense_state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_state');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('residense_state');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->date('marital_state')->nullable();
        });


    }
}
