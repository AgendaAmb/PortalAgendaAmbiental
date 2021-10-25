<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('workshops', 'work_edge') === true)
        {
            Schema::table('workshops', function (Blueprint $table) {
                $table->dropColumn('work_edge');
            });
        }

        if (Schema::hasColumn('workshops', 'work_edge_id') === false)
        {
            Schema::table('workshops', function (Blueprint $table) {
                $table->foreignId('work_edge_id')
                ->default(1)
                ->constrained('work_edges')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            });
        }

        if (Schema::hasColumn('user_workshop', 'filepath') === false)
        {
            Schema::table('user_workshop', function (Blueprint $table) {
                $table->string('filepath')->nullable();
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
        if (Schema::hasColumn('workshops', 'work_edge') === false)
        {
            Schema::table('workshops', function (Blueprint $table) {
                $table->string('work_edge')->nullable();
            });
        }

        if (Schema::hasColumn('workshops', 'work_edge_id') === true)
        {
            Schema::table('workshops', function (Blueprint $table) {
                $table->dropForeign('work_edge_id');
            });
        }

        if (Schema::hasColumn('user_workshop', 'filepath') === true)
        {
            Schema::table('user_workshop', function (Blueprint $table) {
                $table->dropColumn('filepath');
            });
        }
    }
}
