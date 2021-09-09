<?php

use App\Models\Auth\Worker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGabyToHelpers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $worker = Worker::find(22524);
        $worker->assignRole('helper');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $worker = Worker::find(22524);
        $worker->removeRole('helper');
    }
}
