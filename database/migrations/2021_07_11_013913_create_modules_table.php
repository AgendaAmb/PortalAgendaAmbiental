<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('modules'))
        {
            Schema::create('modules', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('url');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('module_user'))
        {
            Schema::create('module_user', function (Blueprint $table) {
                $table->foreignId('module_id')->constrained('modules');
                $table->unsignedBigInteger('user_id');
                $table->string('user_type');

                $table->foreign(['user_id', 'user_type'])
                    ->references(['id', 'type'])
                    ->on('users')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();


                $table->primary(['module_id','user_id','user_type']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_user');
        Schema::dropIfExists('modules');
    }
}
