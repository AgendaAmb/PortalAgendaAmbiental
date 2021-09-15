<?php

use App\Models\Auth\Extern;
use App\Models\Auth\Worker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        $nuevos_comprobantes = [
            [
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '19',
                'file' => Storage::get('Martinez_Mompha_Lorena_Mrion')
            ],[
                'class' => Extern::class,
                'user_type' => 'externs',
                'user_id' => '17',
                'file' => Storage::get('Mayoral_Solis_Ziadany_Gpe'),
            ],[
                'class' => Worker::class,
                'user_type' => 'workers',
                'user_id' => '18215',
                'file' => Storage::get('Pineda_Rico_Zaira'),
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

        /*
        foreach($nuevos_comprobantes as $nuevo_comprobante)
        {
            $path = 'workshops/';
            $path .= $nuevo_comprobante['user_type'].'/';
            $path .= $nuevo_comprobante['user_id'].'/Comprobante-de-pago-unirodada.pdf';

            $new_filepath = Storage::put($path, $nuevo_comprobante['file']);

            DB::table('unirodada_users')
                ->where('user_id', $nuevo_comprobante['user_id'])
                ->where('user_type', )

            ->where('user_workshop_id', 49)->update([ 'invoice_data' => json_encode([
                'RFC' => null,
                'telF' => null,
                'emailF' => null,
                'idUser' => 9,
                '_method' => 'post',
                'nombresF' => null,
                'file_path' => 'workshops/externs/9/Comprobante-de-pago-unirodada.pdf',
                'DomicilioF' => null,
                'isFacturaReq' => 'No'
            ])]);
        }*/
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
