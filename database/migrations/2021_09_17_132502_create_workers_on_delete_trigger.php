<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateWorkersOnDeleteTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER tr_before_workers_delete BEFORE DELETE ON `workers` FOR EACH ROW
            BEGIN
                CALL delete_morph_relations(OLD.id, 'App\\\\Models\\\\Auth\\\\Worker');
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
        DB::unprepared("DROP TRIGGER tr_before_workers_delete");
    }
}
