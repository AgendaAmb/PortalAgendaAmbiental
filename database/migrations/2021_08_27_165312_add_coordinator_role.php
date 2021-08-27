<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class AddCoordinatorRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::create([ 'name' => 'coordinator', 'guard_name' => 'workers' ]);
        Role::create([ 'name' => 'coordinator', 'guard_name' => 'students' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', 'coordinator')->where('guard_name', 'workers')->delete();
        Role::where('name', 'coordinator')->where('guard_name', 'students')->delete();
    }
}
