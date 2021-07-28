<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('curp', 18)->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('gender', 30)->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable();

            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Campos de LDAP 
            $table->string('guid')->unique()->nullable();
            $table->string('domain')->nullable();
            $table->string('dependency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
