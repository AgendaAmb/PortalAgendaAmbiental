<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPayFormRequest;
use App\Http\Requests\SendReceiptRequest;
use App\Http\Requests\UpdateLunchRequest;
use App\Http\Requests\UpdatePaidStatusRequest;
use App\Mail\SendReceipt;
use App\Mail\SendReceiptCP;
use App\Mail\SendFactura;
use App\Mail\SendCAReceipt;
use App\Mail\RegisteredWorkshops;
use App\Mail\sendslowFashion;
use App\Mail\sendUniHuertoReceipt;
//use App\Mail\sendslowFashionReceipt;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\Models\Auth\Worker;
use App\Models\UnirodadaUser;
use App\Models\UserWorkshop;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CursosActualizacionController extends Controller
{
    /**
     * Stores a new unirodada for the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function registerUser(Request $request, $user, $workshops)
    {
        foreach ($workshops as $workshop) {
            # Registra al usuario en user workshops.
            $user_workshop = UserWorkshop::create([
                'user_id' => $user->id,
                'user_type' => $user->type,
                'workshop_id' => $workshop->id,
                'sent' => false,
                'paid' => false,
                'invoice_data' => $request->isFacturaReq == "Si" ? true : false,
            ]);
        }

        # Registra al usuario en la tabla de ca_users 
        $user_workshop->caUser()->updateOrCreate([
            'user_workshop_id' => $user_workshop->id,
            'organization' => $request->organizacion,
            'profesion' => $request->profesion,
        ]);

        $user_workshop->save();
    }

    /**
     * Envía al usuario registrado una ficha de pago.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function sendPayForm(SendPayFormRequest $request)
    {
        $user_workshop = UserWorkshop::find($request->ws_id);
        $user = User::find($user_workshop->user_id);

        try {
            $ws = Workshop::find($user_workshop->workshop_id);
            $ws_name = $ws->name;
            # Se envía el comprobante de pago.
            // ! UNIRODADA MMUS 2022 
            /* if($ws->id == 36){
                Mail::mailer('smtp_unibici')->to($user->email)->send(new SendReceipt($request->file('file')->get()));
            }if ($ws->id == 39) { 
                Mail::mailer('smtp_uniruta')->to($user->email)->send(new SendReceiptCP($request->file('file')->get()));
            }
            */
            // ! CURSOS DE ACTUALIZACIÓN 2023

            if ($ws->id == 45) {
                Mail::mailer('smtp_uniruta')->to($user->email)->send(new sendslowFashion($request->file('file')->get(), $ws_name));
            }
            else{
            
            if ($ws->id == 44) {
                Mail::mailer('smtp_unihuerto')->to($user->email)->send(new sendUniHuertoReceipt($request->file('file')->get(), $ws_name));
            }

            if ($ws->id == 40) {
                Mail::mailer('smtp_imarec')->to($user->email)->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
            }
            if ($ws->id == 41) {
                Mail::mailer('smtp_imarec')->to($user->email)->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
            }
            if ($ws->id == 42) {
                Mail::mailer('smtp_imarec')->to($user->email)->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
            }
            if ($ws->id == 43) {
                Mail::mailer('smtp_imarec')->to($user->email)->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
            }
        }


            //Mail::mailer('smtp_imarec')->to($user->email)->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
            // Mail::mailer('smtp')->to('A291395@alumnos.uaslp.mx')->send(new SendCAReceipt($request->file('file')->get(), $ws_name));
        } catch (\Exception $e) {
            return response()->json(['Message' => 'Error al mandar correo de confirmación'], JsonResponse::HTTP_OK);
        }

        # Envía el comprobante de pago deacuerdo al user_workshop_id
        try {
            $user_workshop->sent = 1;
            $user_workshop->sent_at = Carbon::now();
            $user_workshop->save();
        } catch (\Exception $e) {
            if ($user_workshop != null) $user_workshop->send = 0;
            return response()->json(['Message' => 'Error al mandar recibo de pago'], JsonResponse::HTTP_OK);
        }

        return response()->json([
            'Message' => 'Comprobante enviado'
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Envía el comprobante de pago a un administrativo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function sendReceipt(SendReceiptRequest $request)
    {
        # Obtiene el id del usuario registrado.
        $user = $request->user();

        # Extensión del archivo.
        $mime_type = '.' . $request->file('file')->extension();

        # Almacena en storage.
        $path = $request->file('file')->storePubliclyAs(
            'workshops/' . $user->user_type . '/' . $user->id,
            'Comprobante-de-pago-uniruta' . $mime_type
        );

        # Obtiene el arreglo de datos, que se guardará como json
        $data_array = $request->except('file', 'method');
        $data_array['file_path'] = $path;

        # Guarda los datos fiscales, en caso de que existan.
        $user->invoice_data = $data_array;
        $user->save();

        return response()->json([
            'Message' => 'Datos capturados correctamente'
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Envía el comprobante de pago a un administrativo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function sendFactura(SendReceiptRequest $request)
    {
        //$user = $request->user();
        $user_workshop = UserWorkshop::find($request->ws_id);
        $user = User::find($user_workshop->user_id);

        try {
            $ws_name = Workshop::find($user_workshop->workshop_id)->name;
            # Se envía el comprobante de pago.
            Mail::mailer('smtp')->to($user->email)->send(new SendFactura($request->file('file')->get(), $ws_name));
            // Mail::mailer('smtp')->to('A291395@alumnos.uaslp.mx')->send(new SendFactura($request->file('file')->get(), $ws_name));
        } catch (\Exception $e) {
            return response()->json(['Message' => 'Error al mandar correo de confirmación'], JsonResponse::HTTP_OK);
        }

        return response()->json([
            'Message' => 'Comprobante enviado'
        ], JsonResponse::HTTP_OK);
    }


    /**
     * Envía el comprobante de pago a un administrativo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function cambiaStatusPago(UpdatePaidStatusRequest $request)
    {
        # Obtiene al usuario y actualiza el estado de pago.
        // $user = User::userById($request->idUsuario);
        // $user->paid = $request->nuevoEstadoPago;
        // $user->paid_at = $request->nuevoEstadoPago === true ? Carbon::now() : null;
        // $user->save();
        try {
            $user_workshop = UserWorkshop::find($request->user_workshop_id);
            $user_workshop->paid = $request->nuevoEstadoPago;
            $user_workshop->paid_at = Carbon::now();
            $user_workshop->save();
        } catch (\Exception $e) {
            return response()->json([
                'Message' => 'Error al actualizar estado de pago'
            ], JsonResponse::HTTP_OK);
        }
        return response()->json([
            'Message' => 'Estado de pago actualizado'
        ], JsonResponse::HTTP_OK);
    }


    /**
     * Marca que el usuario recibirá lunch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function actualizaLunchUsuario(UpdateLunchRequest $request)
    {
        # Obtiene al usuario y actualiza el estado de pago.
        $user = User::userById($request->idUsuario);
        $user->lunch = $request->lunch;
        $user->save();

        return response()->json([
            'Message' => 'Cambiado el estado del lunch'
        ], JsonResponse::HTTP_OK);
    }
}
