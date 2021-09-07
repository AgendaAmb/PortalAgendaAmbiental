<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUnirodadaUsersTable extends Migration
{
    /**
     * Delete user tables triggers.
     *
     * @return void
     */
    private function createTriggers()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_workers_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_students_delete");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_before_externs_delete");
        
        DB::unprepared("CREATE TRIGGER tr_before_workers_delete BEFORE DELETE ON `workers` FOR EACH ROW
        BEGIN
            CALL delete_morph_relations(OLD.id, 'App\\\\Models\\\\Auth\\\\Worker');
        END");

        DB::unprepared("CREATE TRIGGER tr_before_students_delete BEFORE DELETE ON `students` FOR EACH ROW
        BEGIN
            CALL delete_morph_relations(OLD.id, 'App\\\\Models\\\\Auth\\\\Student');
        END
        ");

        DB::unprepared("CREATE TRIGGER tr_before_externs_delete BEFORE DELETE ON `externs` FOR EACH ROW
        BEGIN
            CALL delete_morph_relations(OLD.id, 'App\\\\Models\\\\Auth\\\\Extern');
        END
        ");
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unirodada_users', function (Blueprint $table) {
            $table->id();
            $table->morphs('user');

            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->string('group')->nullable();
            $table->timestamps();
        });

        DB::unprepared("DROP PROCEDURE IF EXISTS delete_morph_relations");
        DB::unprepared("CREATE PROCEDURE delete_morph_relations (IN id BIGINT, IN morph_user_type VARCHAR(255))
            BEGIN
                SET SQL_SAFE_UPDATES = 0;

                DELETE FROM module_user
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM model_has_roles
                WHERE model_id = id AND model_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM user_workshop
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM unirodada_users
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                SET SQL_SAFE_UPDATES = 1;
            END
        ");

        $this->createTriggers();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unirodada_users');

        DB::unprepared("DROP PROCEDURE IF EXISTS delete_morph_relations");
        DB::unprepared("CREATE PROCEDURE delete_morph_relations (IN id BIGINT, IN morph_user_type VARCHAR(255))
            BEGIN
                SET SQL_SAFE_UPDATES = 0;

                DELETE FROM module_user
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM model_has_roles
                WHERE model_id = id AND model_type COLLATE utf8mb4_general_ci = morph_user_type;

                DELETE FROM user_workshop
                WHERE user_id = id AND user_type COLLATE utf8mb4_general_ci = morph_user_type;

                SET SQL_SAFE_UPDATES = 1;
            END
        ");

        $this->createTriggers();
    }
}
