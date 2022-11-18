<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinirodadaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minirodada_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_workshop_id');
            $table->string('name')->nullable();
            $table->unsignedInteger('age')->nullable();
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
        Schema::dropIfExists('minirodada_users');
    }

}
