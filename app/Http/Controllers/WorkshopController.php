<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPayFormRequest;
use App\Http\Requests\SendReceiptRequest;
use App\Http\Requests\StoreWorkshopRequest;
use App\Mail\RegisteredToMMUSConference;
use App\Mail\RegisteredWorkshops;
use App\Mail\SendReceipt;
use App\Models\Auth\User;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    public function GetWorkshops(Request $request){
        $user=User::userById($request->id);
        $Workshops=[];


        return($user->getRegisteredWorkshops());
    }

    /**
     * Stores a new user workshop
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkshopRequest $request)
    {
        # Cursos registrados por el usuario
        $courses = collect($request->cursosInscritosMMUS ?? []);

        # Usuario autenticado
        $user = $request->user();

        # Registra al usuario al evento o cursos especificados.
        $this->registerCourses($request, $courses);

        # Actualiza los datos del usuario.
        $user->zip_code = $request->CP ?? $user->zip_code;
        $user->residence = $request->LugarResidencia ?? $user->residence;
        $user->ocupation = $request->Ocupacion ?? $user->ocupation;
        $user->ethnicity = $request->GEtnico ?? $user->ethnicity;
        $user->disability = $request->Discapacidad ?? $user->disability;
        $user->ocupation = $request->Ocupacion ?? $user->ocupation;
        $user->courses = $request->CursoCursado ?? $user->courses;
        $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
        $user->disability = $request->Discapacidad ?? $user->disability;
        $user->comments = $request->ComentariosSugerencias ?? $user->comments;
        $user->interested_on_further_courses = $request->InteresAsistencia ?? $user->interested_on_further_courses;
        $user->save();

        return response()->json([ 'status' => 200], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    private function registerCourses(Request $request, $courses)
    {
        # Usuario autenticado
        $user = $request->user();

        # Cursos mmus del usuario y unirodadas.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->whereNotIn('name', $courses)
            ->pluck('workshops.id');

        # Se eliminan los cursos a los que no haya asistido y a
        # aquellos que haya eliminado del modal.
        $user->workshops()->detach($workshops);

        # Agrega cada uno de los cursos
        foreach ($courses as $workshop)
        {
            # Busca el curso por su nombre.
            $workshop_model = Workshop::firstWhere('name', $workshop);

            # Registra el siguiente curso, en caso de que no exista.
            if ($workshop_model === null)
                continue;

            # Registra el siguiente curso, en caso de que el usuario ya
            # se haya registrado.
            if ($user->hasWorkshop($workshop))
                continue;

            # Envía una notificación adicional al usuario, en caso de que
            # se haya registrado a la conferencia 2 del MMUS.
            if ($workshop_model->name === 'curso movilidad y urbanismo')
            {
                //Mail::to($user)->send(new RegisteredToMMUSConference);
                $user->workshops()->attach($workshop_model->id, [
                    'sent' => true,
                    'sent_at' => Carbon::now()->timezone('America/Mexico_City')
                ]);
            }
            else if ($workshop_model->name === 'Unirodada cicloturística a la Cañada del Lobo')
            {
                $user->updateUnirodadaData($workshop_model, [
                    'emergency_contact' => $request->NombreContacto,
                    'emergency_contact_phone' => $request->CelularContacto,
                    'group' => $request->GrupoC,
                    'health_condition' => collect($request->CondicionSalud ?? [])->first()
                ]);
            }
            else
            {
                $user->workshops()->attach($workshop_model->id, [
                    'sent' => false
                ]);
            }
        }

        # Obtiene los cursos registrados.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->get();

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.
        if ($workshops->count() > 0)
            Mail::to($user)->send(new RegisteredWorkshops($workshops));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function markAsistence(Request $request)
    {
        # Obtiene el id del usuario registrado.
        $user = User::retrieveById($request->idUser, 'students')
            ?? User::retrieveById($request->idUser, 'workers')
            ?? User::retrieveById($request->idUser, 'externs');

        # Registra la asistencia del usuario.
        $user->workshops()->updateExistingPivot($request->idWorkshop, [
            'assisted_to_workshop' => true,
        ]);

        return response()->json([ 'Message' => 'Asistencia de usuario registrada' ], JsonResponse::HTTP_OK);
    }

    /**
     * Add a receipt to the registered event.
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

        if ($event->type === 'unirodada')
        {
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

        return response()->json([
            'Message' => 'No se envió el comprobante'
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Add a receipt to the registered event.
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
        $data_array = $request->only(
            'DomicilioF',
            'emailF',
            'telF'
        );

        $data_array['file_path'] = $path;

        # Guarda los datos fiscales, en caso de que existan.
        $user->invoice_data = $data_array;
        $user->save();

        return response()->json([
            'Message' => 'Datos capturados correctamente'
        ], JsonResponse::HTTP_OK);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Workshop::all();
    }
}
