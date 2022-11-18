<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_workshop_id');
            $table->string('organization')->nullable(); // Factuldad y organización
            $table->string('profesion')->nullable();
            $table->boolean('lunch')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_users');
    }
}
