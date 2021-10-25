<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUnirodadaUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('unirodada_users'))
            return;

        Schema::create('unirodada_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_workshop_id');

            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('group')->nullable();
            $table->json('invoice_data')->nullable();
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
        Schema::dropIfExists('unirodada_users');
    }
}
