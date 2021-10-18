<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
            $table->unsignedBigInteger('id');
            $table->string('type');

            $table->primary(['id', 'type']);

            $table->string('curp', 18)->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('altern_email')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('users');
    }
}
