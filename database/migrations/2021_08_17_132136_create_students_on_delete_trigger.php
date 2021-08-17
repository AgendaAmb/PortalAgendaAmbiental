<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStudentsOnDeleteTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER tr_before_students_delete BEFORE DELETE ON `students` FOR EACH ROW
            BEGIN
                CALL delete_morph_relations(OLD.id, 'App\\\\Models\\\\Auth\\\\Student');
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER tr_before_students_delete");
    }
}
