<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgregarComprobantesDeMaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $file = Storage::get('Diaz_Canales_Edith_Benjamina.pdf');
        $file2 = Storage::get('Negrete_Lara_Ana_Sofia.pdf');

        $new_filepath = Storage::put('workshops/externs/9/Comprobante-de-pago-unirodada.pdf', $file);
        $new_filepath2 = Storage::put('workshops/students/337201/Comprobante-de-pago-unirodada.pdf', $file2);

        DB::table('unirodada_users')->where('user_workshop_id', 49)->update([ 'invoice_data' => json_encode([
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

        DB::table('unirodada_users')->where('user_workshop_id', 36)->update([ 'invoice_data' => json_encode([
            'RFC' => null,
            'telF' => null,
            'emailF' => null,
            'idUser' => 337201,
            '_method' => 'post',
            'nombresF' => null,
            'file_path' => 'workshops/students/337201/Comprobante-de-pago-unirodada.pdf',
            'DomicilioF' => null,
            'isFacturaReq' => 'No'
        ])]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Storage::delete([
            'workshops/externs/9/Comprobante-de-pago-unirodada.pdf',
            'workshops/students/337201/Comprobante-de-pago-unirodada.pdf',
        ]);

        DB::table('unirodada_users')->where('user_workshop_id', 49)->update([ 'invoice_data' => null]);
        DB::table('unirodada_users')->where('user_workshop_id', 36)->update([ 'invoice_data' => null]);
    }
}
