<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externs', function (Blueprint $table) {
            $table->id();
            $table->string('curp', 18)->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable();

            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('externs');
    }
}
