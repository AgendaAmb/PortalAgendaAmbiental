<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreToEgresadosDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('egresados_data', function (Blueprint $table) {
            $table->string('gen')->nullable();
            $table->string('email_empleador')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('egresados_data', function (Blueprint $table) {
            $table->dropColumn('isform');
        });
    }
}
