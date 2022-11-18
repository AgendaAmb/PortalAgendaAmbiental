<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGgjUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla para registrar a los usuarios del global goals jam 2021-2022 2
        Schema::create('ggj_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('institution');
            $table->string('nedu');
            $table->unsignedBigInteger('user_workshop_id');

            $table->foreign('user_workshop_id')
                ->references('id')
                ->on('user_workshop')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ggj_users');
    }
}
