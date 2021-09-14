<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedAtIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('externs', function (Blueprint $table) {
            $table->index('created_at');
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->index('created_at');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('externs', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });
    }
}
