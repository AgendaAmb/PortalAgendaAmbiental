<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('middlename', 80)->nullable()->change();
            $table->string('surname', 80)->nullable()->change();
            $table->string('gender', 80)->nullable()->change();
            $table->string('phone_number', 30)->nullable()->change();
            $table->string('interested_on_further_courses', 50)->nullable()->change();
            $table->string('domain', 60)->nullable()->change();
            $table->string('dependency', 80)->nullable()->change();
            
            
            $table->dropColumn('previous_courses');
            $table->dropColumn('emergency_contact');
            $table->dropColumn('emergency_contact_phone');
            $table->dropColumn('health_condition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('middlename', 255)->nullable()->change();
            $table->string('surname', 255)->nullable()->change();
            $table->string('gender', 255)->nullable()->change();
            $table->string('phone_number', 255)->nullable()->change();
            $table->string('interested_on_further_courses', 255)->nullable()->change();
            $table->string('domain', 255)->nullable()->change();
            $table->string('dependency', 255)->nullable()->change();

            $table->string('previous_courses')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
        });
    }
}
