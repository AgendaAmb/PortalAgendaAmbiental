<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Auth\User;
use App\Models\Workshop;
class CreateUserTallerHuerto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        $workshop_model = Workshop::firstWhere('name', 'Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?(27 Noviembre)');

        $user=User::find(25137);
        $user->assignWorkshop($workshop_model->id);

        
        $user2=User::find(278452);
        $user2->assignWorkshop($workshop_model->id);
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('user_taller_huerto');
    }
}
