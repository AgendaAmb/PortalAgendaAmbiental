<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReutronicUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // {posgrado: '', ocupacion: '', sector:'', empleador :'', contact_empleador:'',comentarios:''}
        Schema::create('reutronic_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_workshop_id');
            $table->boolean('prev_solicitud');
            $table->text('material');
            $table->text('detalles');
            $table->text('razondeuso');
            $table->timestamps();

            $table->foreign('user_workshop_id')->references('id')->on('user_workshop')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reutronic_users');
    }
}
