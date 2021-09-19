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
        Artisan::call('database:backup');

        $externs = DB::table('externs')->select('*')->selectSub("SELECT 'App\\\\Models\\\\Auth\\\\Extern'", 'type')->get();
        $students = DB::table('students')->select('*')->selectSub("SELECT 'App\\\\Models\\\\Auth\\\\Student'", 'type')->get();
        $workers = DB::table('workers')->select('*')->selectSub("SELECT 'App\\\\Models\\\\Auth\\\\Worker'", 'type')->get();


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
            $table->string('previous_courses')->nullable();
            $table->string('password')->nullable();
            $table->string('interested_on_further_courses')->nullable();
            $table->string('comments')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('health_condition')->nullable();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Campos de LDAP
            $table->string('guid')->unique()->nullable();
            $table->string('domain')->nullable();
            $table->string('dependency')->nullable();
            $table->softDeletes();
        });
        
        foreach ($externs as $extern)
            DB::table('users')->insertGetId(collect($extern)->toArray());

        foreach ($workers as $worker)
            DB::table('users')->insertGetId(collect($worker)->toArray());

        foreach ($students as $student)
            DB::table('users')->insertGetId(collect($student)->toArray());

        Schema::table('model_has_roles', function (Blueprint $table) {

            $table->dropIndex(['model_id', 'model_type']);
            $table->foreign(['model_id', 'model_type'])
                ->references(['id', 'type'])
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('user_workshop', function (Blueprint $table) {

            $table->dropIndex(['user_type', 'user_id']);
            $table->foreign(['user_id', 'user_type'])
                ->references(['id', 'type'])
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('module_user', function (Blueprint $table) {
            $table->dropIndex('user_types');
            $table->foreign(['user_id', 'user_type'])
                ->references(['id', 'type'])
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->dropColumn('email_verified_at');
            $table->dropSoftDeletes();


            $table->primary(['module_id','user_id','user_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_user', function (Blueprint $table) {

            $table->dropPrimary(['module_id','user_id','user_type']);
            $table->dropForeign(['user_id', 'user_type']);
            $table->index(['user_type', 'user_id'], 'user_types');

            $table->date('email_verified_at')->default(Carbon::now());
            $table->softDeletes();
        });

        Schema::table('user_workshop', function (Blueprint $table) {

            $table->dropForeign(['user_id', 'user_type']);
            $table->index(['user_type', 'user_id']);
        });

        Schema::table('model_has_roles', function (Blueprint $table) {

            $table->dropForeign(['model_id', 'model_type']);
            $table->index(['model_id', 'model_type']);
        });

        Schema::dropIfExists('users');
    }
}
