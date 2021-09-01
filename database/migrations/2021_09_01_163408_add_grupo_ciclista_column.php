<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrupoCiclistaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('externs', function (Blueprint $table) {
            $table->string('grupoCiclista')->nullable();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->string('grupoCiclista')->nullable();
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->string('grupoCiclista')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('externs', function (Blueprint $table) {
            $table->dropColumn('grupoCiclista');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('grupoCiclista');
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('grupoCiclista');
        });
    }
}
