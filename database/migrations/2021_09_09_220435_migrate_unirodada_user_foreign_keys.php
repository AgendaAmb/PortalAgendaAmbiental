<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\UnirodadaUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateUnirodadaUserForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {

            $table->unsignedBigInteger('user_workshop_id')->default(0)->after('id');
        }); 

        $students = Student::whereHas('workshops', function($query){
            $query->where('name', 'Unirodada cicloturística a la Cañada del Lobo');

        })->get();

        $workers = Worker::whereHas('workshops', function($query){
            $query->where('name', 'Unirodada cicloturística a la Cañada del Lobo');

        })->get();

        $externs = Extern::whereHas('workshops', function($query){
            $query->where('name', 'Unirodada cicloturística a la Cañada del Lobo');

        })->get();
        
        $students->merge($workers)->merge($externs)->each(function($student){

            # Obtiene los datos del usuario de la unirodada.
            $unirodada_user = DB::table('unirodada_users')
                ->where('user_id', $student->id)
                ->where('user_type', get_class($student))
                ->first();

            # Asocia el id del pivote a los datos de la unirodada.
            $student->workshops()->tipo('unirodada')->latest()
            ->get()->each(function($workshop) use ($unirodada_user){
                
                DB::table('unirodada_users')
                ->where('id', $unirodada_user->id)
                ->update(['user_workshop_id' => $workshop->pivot->id]);
            });
        });

        UnirodadaUser::where('user_workshop_id', 0)->delete();

        Schema::table('unirodada_users', function (Blueprint $table) {

            $table->foreign('user_workshop_id')
                ->references('id')
                ->on('user_workshop')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->dropColumn('id');
            $table->primary('user_workshop_id');
            $table->dropMorphs('user');
            $table->string('payment_receipt_path')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unirodada_users', function (Blueprint $table) {

            $table->dropColumn('user_workshop_id');
        }); 
    }
}
