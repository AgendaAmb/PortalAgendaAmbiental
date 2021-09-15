<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Worker;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AgregaComprobantesDePagoMaru2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('database:backup');

        $nuevos_comprobantes = [
            [
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '19',
                'file' => Storage::get('Martinez_Mompha_Lorena_Mrion.pdf')
            ],[
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '17',
                'file' => Storage::get('Mayoral_Solis_Ziadany_Gpe.pdf'),
            ],[
                'class' => Worker::class,
                'user_type' => 'workers',
                'user_id' => '18215',
                'file' => Storage::get('Pineda_Rico_Zaira.pdf'),
            ],[
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '18',
                'file' => Storage::get('Tovar_Sanchez_Alejandro.pdf'),
            ],[
                'class' => Worker::class,
                'user_type' => 'workers',
                'user_id' => '16158',
                'file' => Storage::get('Tovar_Tovar_Rosa_Lina.pdf'),
            ],
        ];


        foreach($nuevos_comprobantes as $nuevo_comprobante)
        {
            $path = 'workshops/';
            $path .= $nuevo_comprobante['user_type'].'/';
            $path .= $nuevo_comprobante['user_id'].'/Comprobante-de-pago-unirodada.pdf';

            Storage::put($path, $nuevo_comprobante['file']);

            DB::table('unirodada_users')
                ->join('user_workshop', 'user_workshop.id', '=', 'user_workshop_id')
                ->join('workshops', 'workshops.id', '=', 'workshop_id')
                ->where('workshop_id', 6)
                ->where('user_id', $nuevo_comprobante['user_id'])
                ->where('user_type', $nuevo_comprobante['class'])
                ->update([ 'invoice_data' => json_encode([
                    'RFC' => null,
                    'telF' => null,
                    'emailF' => null,
                    'idUser' => $nuevo_comprobante['user_id'],
                    '_method' => 'post',
                    'nombresF' => null,
                    'file_path' => $path,
                    'DomicilioF' => null,
                    'isFacturaReq' => 'No'
                ])]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Artisan::call('database:restore ', [ Carbon::now()->toString()]);

        $comprobantes = [
            [
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '19',
            ],[
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '17',
            ],[
                'class' => Worker::class,
                'user_type' => 'workers',
                'user_id' => '18215',
            ],[
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '18',
            ],[
                'class' => Worker::class,
                'user_type' => 'workers',
                'user_id' => '16158',
            ],
        ];

        foreach($comprobantes as $comprobante)
        {
            $path = 'workshops/';
            $path .= $comprobante['user_type'].'/';
            $path .= $comprobante['user_id'].'/Comprobante-de-pago-unirodada.pdf';

            Storage::delete($path);
        }
    }
}
