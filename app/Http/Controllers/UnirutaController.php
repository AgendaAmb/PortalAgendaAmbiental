<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPayFormRequest;
use App\Http\Requests\SendReceiptRequest;
use App\Http\Requests\UpdateLunchRequest;
use App\Http\Requests\UpdatePaidStatusRequest;
use App\Mail\SendReceipt;
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

class UnirutaController extends Controller
{
    /**
     * Stores a new unirodada for the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function registerUser(Request $request, $user, $workshop)
    {
        # Verifica que la condición de salud no esté vacía.
        if (collect($request->CondicionSalud ?? [])->count() === 0)
            return response()->json([
                'message' => 'Selecciona el estado de salud'
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        # Registra al usuario en la uniruta.
        $user_workshop = UserWorkshop::create([
            'user_id' => $user->id,
            'user_type' => $user->type,
            'workshop_id' => $workshop->id,
            'sent' => false,
        ]);


        # Registra los datos de la unirodada del usuario.
        $user_workshop->unirutaUser()->create([
            'user_workshop_id' => $user_workshop->id,
            'emergency_contact' => $request->NombreContacto,
            'emergency_contact_phone' => $request->CelularContacto,
            'health_condition' => collect($request->CondicionSalud ?? [])->first()
        ]);
        
        $user_workshop->paid = false;

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
        # Obtiene el id del usuario registrado.
        $user = Student::find($request->idUser)
            ?? Worker::find($request->idUser)
            ?? Extern::find($request->idUser);
            
        $user = User::where('id', $user->id)->where('type', $user->type)->first();

        # Envía el comprobante de pago,en caso de que el evento
        # registrado haya sido una unihuerto casa 2022.
        
        $event = Workshop::find(15); //workshop 15 = uniruta sierra de alvarez

        # Registra la asistencia del usuario.
        $user->workshops()->updateExistingPivot($event->id, [
            'sent' => true,
            'sent_at' => Carbon::now()->timezone('America/Mexico_City')
        ]);

        # Se envía el comprobante de pago.
        Mail::mailer('smtp_uniruta')->to($user->email)->send(new SendReceipt($request->file('file')->get()));

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
        $mime_type = '.'.$request->file('file')->extension();

        # Almacena en storage.
        $path = $request->file('file')->storePubliclyAs(
            'workshops/'.$user->user_type.'/'.$user->id,
            'Comprobante-de-pago-uniruta'.$mime_type
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
    public function cambiaStatusPago(UpdatePaidStatusRequest $request)
    {
        # Obtiene al usuario y actualiza el estado de pago.
        $user = User::userById($request->idUsuario);
        $user->paid = $request->nuevoEstadoPago;
        $user->paid_at = $request->nuevoEstadoPago === true ? Carbon::now() : null;
        $user->save();

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