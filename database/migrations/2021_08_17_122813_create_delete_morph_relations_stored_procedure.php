<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDeleteMorphRelationsStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS delete_morph_relations");
        DB::unprepared("CREATE PROCEDURE delete_morph_relations (IN id BIGINT, IN morph_user_type VARCHAR(255))
            BEGIN
                SET SQL_SAFE_UPDATES = 0;

                DELETE FROM module_user 
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM model_has_roles
                WHERE model_id = id AND model_type COLLATE utf8mb4_general_ci = morph_user_type;

                SET SQL_SAFE_UPDATES = 1;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS delete_morph_relations");
    }
}
