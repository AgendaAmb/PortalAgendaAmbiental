<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('curp', 18)->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('residence')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('disability')->nullable();
            $table->string('courses')->nullable();
            $table->string('password')->nullable();
            $table->string('interested_on_further_courses')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Campos de LDAP 
            $table->string('guid')->unique()->nullable();
            $table->string('domain')->nullable();
            $table->string('dependency')->nullable();
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
        Schema::dropIfExists('workers');
    }
}
