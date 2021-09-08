<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class AddHelperRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::create([ 'name' => 'helper', 'guard_name' => 'workers' ]);
        Role::create([ 'name' => 'helper', 'guard_name' => 'students' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', 'helper')->where('guard_name', 'workers')->delete();
        Role::where('name', 'helper')->where('guard_name', 'students')->delete();
    }
}
