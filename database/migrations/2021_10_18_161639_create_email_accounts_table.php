<?php

use App\Models\WorkEdge;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('email_accounts') === true)
            return;

        Schema::create('email_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->foreignId('work_edge_id')
                ->constrained('work_edges')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        WorkEdge::find(1)->emailAccounts()->createMany([
            ['email'=>"coordinacion.academica@uaslp.mx"],
            ['email'=>"pmpca@uaslp.mx"],
            ['email'=>"pmpca.enrem@uaslp.mx"],
            ['email'=>"imarec.academico@uaslp.mx"],
            ['email'=>"imarec.control@uaslp.mx"]
        ]);

        WorkEdge::find(2)->emailAccounts()->createMany([
            ['email'=>"gestion.ambiental@uaslp.mx"],
            ['email'=>"unibici@uaslp.mx"],
            ['email'=>"unihuerto@uaslp.mx"],
            ['email'=>"proserem@uaslp.mx"],
        ]);

        WorkEdge::find(3)->emailAccounts()->create(['email'=>"vinculacion.agenda@uaslp.mx"]);
        WorkEdge::find(5)->emailAccounts()->create(['email'=>"difusion.agenda@uaslp.mx"]);


        WorkEdge::find(4)->emailAccounts()->createMany([
            ['email'=>"rtic.ambiental@uaslp.mx"],
            ['email'=>"agenda.ambiental@uaslp.mx"],
            ['email'=>"imarec@uaslp.mx"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_accounts');
    }
}
