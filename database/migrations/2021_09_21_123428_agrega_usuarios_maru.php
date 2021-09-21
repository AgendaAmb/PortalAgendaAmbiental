<?php

use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AgregaUsuariosMaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('database:backup');

        $idWorkshop = DB::table('user_workshop')
        ->insertGetId([
            'user_id' => 213321,
            'user_type' => Student::class,
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

        $idWorkshop = DB::table('user_workshop')
        ->insertGetId([
            'user_id' => 249109,
            'user_type' => Student::class,
            'workshop_id' => 6,
            'paid' => true,
            'paid_at' => Carbon::now()
        ]);

        DB::table('unirodada_users')
        ->insert([
            'user_workshop_id' => $idWorkshop,
            'emergency_contact' => 'LUIS MANUEL MAGAÑA',
            'emergency_contact_phone' => '4881014574',
            'group' => 'staff',
            'health_condition' => 'CondicionBuena',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'lunch' => 0,
        ]);

        $idWorkshop = DB::table('user_workshop')
        ->insertGetId([
            'user_id' => 9246,
            'user_type' => Worker::class,
            'workshop_id' => 6,
            'paid' => true,
            'paid_at' => Carbon::now()
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

        $idWorkshop = DB::table('user_workshop')
        ->insertGetId([
            'user_id' => 27726,
            'user_type' => Worker::class,
            'workshop_id' => 6,
            'paid' => true,
            'paid_at' => Carbon::now()
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
