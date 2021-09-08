<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserUnirodadaColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('externs', function (Blueprint $table) {
            //$table->dropColumn('emergency_contact');
            //$table->dropColumn('emergency_contact_phone');
            //$table->dropColumn('health_condition');
            //$table->dropColumn('grupoCiclista');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('emergency_contact');
            $table->dropColumn('emergency_contact_phone');
            $table->dropColumn('health_condition');
            $table->dropColumn('grupoCiclista');
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('emergency_contact');
            $table->dropColumn('emergency_contact_phone');
            $table->dropColumn('health_condition');
            $table->dropColumn('grupoCiclista');
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
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('grupoCiclista')->nullable();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('grupoCiclista')->nullable();
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('grupoCiclista')->nullable();
        });
    }
}
