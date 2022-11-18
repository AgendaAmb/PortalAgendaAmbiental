<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // {posgrado: '', ocupacion: '', sector:'', empleador :'', contact_empleador:'',comentarios:''}
        Schema::create('egresados_data', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('posgrado')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('sector')->nullable();
            $table->string('empleador')->nullable();
            $table->string('contact_empleador')->nullable();
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresados_data');
    }
}
