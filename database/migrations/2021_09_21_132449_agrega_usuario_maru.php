<?php

use App\Models\Auth\Extern;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AgregaUsuarioMaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $idWorkshop = DB::table('user_workshop')
        ->insertGetId([
            'user_id' => 42,
            'user_type' => Extern::class,
            'workshop_id' => 6,
            'paid' => false
        ]);

        DB::table('unirodada_users')
        ->insert([
            'user_workshop_id' => $idWorkshop,
            'emergency_contact' => 'LUIS ENRIQUE MEJIA ESTRADA',
            'emergency_contact_phone' => '4441868243',
            'group' => 'ninguno',
            'health_condition' => 'CondicionBuena',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'lunch' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
