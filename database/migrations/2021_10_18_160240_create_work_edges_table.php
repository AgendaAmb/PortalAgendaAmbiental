<?php

use App\Models\WorkEdge;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkEdgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('work_edges'))
        {
            Schema::create('work_edges', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        WorkEdge::firstOrCreate(['name'=>'Educación']);
        WorkEdge::firstOrCreate(['name'=>'Gestión']);
        WorkEdge::firstOrCreate(['name'=>'Vinculación']);
        WorkEdge::firstOrCreate(['name'=>'Administración']);
        WorkEdge::firstOrCreate(['name'=>'Comunicación']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_edges');
    }
}
