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
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('nationality')->nullable();
            $table->string('residence')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('disability')->nullable();
            $table->string('courses')->nullable();
            $table->string('password')->nullable();
            $table->string('interested_on_further_courses')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('comments')->nullable();
            $table->string('previous_courses')->nullable();

            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
