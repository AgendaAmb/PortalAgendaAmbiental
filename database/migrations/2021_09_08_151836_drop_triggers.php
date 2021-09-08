<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_workers_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_students_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_externs_delete");
        DB::unprepared("DROP PROCEDURE IF EXISTS delete_morph_relations");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
