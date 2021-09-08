<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('externs', function (Blueprint $table) {
            $table->string('type')->default(Extern::class);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->string('type')->default(Student::class);
        });

        Schema::table('workers', function (Blueprint $table) {
            $table->string('type')->default(Worker::class);
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
            $table->dropColumn('type');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('type');

        });

        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
