<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnitruequeUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitrueque_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_workshop_id');
            $table->string('MaterialesIntercambio');
            $table->string('Cantidad');
            $table->string('Mobiliario');
            $table->string('EmpresaParticipante')->nullable();

            $table->primary(['user_workshop_id']);
            $table->foreign(['user_workshop_id'])
                ->references(['id'])
                ->on('user_workshop')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_taller_huerto');
    }
}
