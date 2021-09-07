<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\UnirodadaUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrateUserFieldsToUnirodadaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $externs = Extern::select(
            'id',
            'emergency_contact',
            'emergency_contact_phone',
            'health_condition',
            'grupoCiclista'
        )->get();

        $students = Student::select(
            'id',
            'emergency_contact',
            'emergency_contact_phone',
            'health_condition',
            'grupoCiclista'
        )->get();

        $workers = Worker::select(
            'id',
            'emergency_contact',
            'emergency_contact_phone',
            'health_condition',
            'grupoCiclista'
        )->get();

        foreach ($externs as $extern)
        {
            UnirodadaUser::firstOrCreate([
                'user_type' => Extern::class,
                'user_id' => $extern->id
            ],[
                'emergency_contact' => $extern->emergency_contact,
                'emergency_contact_phone' => $extern->emergency_contact_phone,
                'health_condition' => $extern->health_condition,
                'group' => $extern->grupoCiclista,
            ]);
        }

        foreach ($students as $student)
        {
            UnirodadaUser::firstOrCreate([
                'user_type' => Student::class,
                'user_id' => $student->id
            ],[
                'emergency_contact' => $student->emergency_contact,
                'emergency_contact_phone' => $student->emergency_contact_phone,
                'health_condition' => $student->health_condition,
                'group' => $student->grupoCiclista,
            ]);
        }

        foreach ($workers as $worker)
        {
            UnirodadaUser::firstOrCreate([
                'user_type' => Worker::class,
                'user_id' => $worker->id
            ],[
                'emergency_contact' => $worker->emergency_contact,
                'emergency_contact_phone' => $worker->emergency_contact_phone,
                'health_condition' => $worker->health_condition,
                'group' => $worker->grupoCiclista,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $unirodada_users = UnirodadaUser::all();

        foreach ($unirodada_users as $unirodada_user)
        {
            $user = $unirodada_user->user_type === Extern::class
                ?    Extern::find($unirodada_user->user_id)
                :   ($unirodada_user->user_type === Worker::class
                ?   Worker::find($unirodada_user->user_id)
                :   Student::find($unirodada_user->user_id));

            if ($user !== null)
            {
                $user->emergency_contact = $unirodada_user->emergency_contact;
                $user->emergency_contact_phone = $unirodada_user->emergency_contact_phone;
                $user->health_condition = $unirodada_user->health_condition;
                $user->grupoCiclista = $unirodada_user->group;

                $user->save();
                $unirodada_user->delete();
            }
        }
    }
}
