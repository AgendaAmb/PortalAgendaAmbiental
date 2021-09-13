<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPayFormRequest;
use App\Http\Requests\SendReceiptRequest;
use App\Mail\SendReceipt;
use App\Models\Auth\User;
use App\Models\UnirodadaUser;
use App\Models\UserWorkshop;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UnirodadaController extends Controller
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

        # Registra al usuario a la unirodada.
        $user_workshop = UserWorkshop::create([
            'user_id' => $user->id,
            'user_type' => get_class($user),
            'workshop_id' => $workshop->id,
            'sent' => false,
        ]);

        # Registra los datos de la unirodada del usuario.
        $user_workshop->unirodadaUser()->create([
            'user_workshop_id' => $user_workshop->id,
            'emergency_contact' => $request->NombreContacto,
            'emergency_contact_phone' => $request->CelularContacto,
            'group' => Str::lower($request->GrupoC),
            'health_condition' => collect($request->CondicionSalud ?? [])->first()
        ]);

        # A los staff no se les cobra
        if ($user_workshop->group === 'staff')
        {
            $user_workshop->paid = true;
            $user_workshop->paid_at = Carbon::now()->locale('America/Mexico_City');
        }

        # A la FUP se le otorgan 10 becas.
        else if ($user_workshop->group === 'fup')
        {
            # Total de ciclistas de la fup.
            $num_becas_fup = UnirodadaUser::where('group', 'fup')
                ->whereIn('workshop_id',  UserWorkshop::where('workshop_id', $workshop->id)->pluck('id')
            );

            # Solo no se les cobra a los 10 primeros usuarios.
            if ($num_becas_fup < 10)
            {
                $user_workshop->paid = true;
                $user_workshop->paid_at = Carbon::now()->locale('America/Mexico_City');
            }
            else
            {
                $user_workshop->paid = false;
            }
        }

        # El usuario aún no paga
        else
        {
            $user_workshop->paid = false;
        }
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
        $user = User::retrieveById($request->idUser, 'students')
            ?? User::retrieveById($request->idUser, 'workers')
            ?? User::retrieveById($request->idUser, 'externs');

        # Envía el comprobante de pago,en caso de que el evento
        # registrado haya sido una unirodada.
        $event = Workshop::firstWhere('name', 'Unirodada cicloturística a la Cañada del Lobo');

        # Se envía el comprobante de pago.
        Mail::to($user)->send(new SendReceipt($request->file('file')->get()));

        # Registra la asistencia del usuario.
        $user->workshops()->updateExistingPivot($event->id, [
            'sent' => true,
            'sent_at' => Carbon::now()->timezone('America/Mexico_City')
        ]);

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
            'Comprobante-de-pago-unirodada'.$mime_type
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
}
