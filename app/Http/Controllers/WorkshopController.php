<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Mail\RegisteredWorkshops;
use App\Models\Auth\User;
use App\Models\Workshop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
/*
    |--------------------------------------------------------------------------
    | Workshop Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que gestiona la lógica de los cursos y talleres de
    | la agenda ambiental.
    |
    */

    /**
     * Controlador de unirodadas.
     *
     * @var UnirodadaController
     */
    private $unirodada_controller;

    /**
     * Crea el controlador y las dependencias requeridas para su
     * funcionamiento.
     */
    public function __construct()
    {
        $this->unirodada_controller = new UnirodadaController;
    }


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
        try
        {
            # Cursos registrados por el usuario
            $courses = collect($request->cursosInscritosMMUS ?? []);

            # Usuario autenticado
            $user = $request->user();

            # Registra al usuario al evento o cursos especificados.
            if ($courses->count() > 0)
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
            $user->academic_degree = $request->NAcademico ?? $user->academic_degree;
            $user->save();


            # Verifica si hay datos de facturación.
            if ($request->isFacturaReq === 'Si') {
                DB::table('invoice_data')
                    ->updateOrInsert([
                        'user_id' => $user->id,
                        'user_type' => $user->type
                    ],[
                        'rfc' => $request->RFC,
                        'name' => $request->nombresF,
                        'email' => $request->emailF,
                        'address' =>  $request->DomicilioF,
                        'phone' => $request->telF
                    ]);
            }

            return new JsonResponse(['message' => 'Curso registrado'], JsonResponse::HTTP_OK);
        }
        catch (Exception $e)
        {
            Log::error('Ocurrió un error: '.$e->getMessage());
            throw $e;
        }
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
        $user = $request->user('workers') ?? $request->user('students') ?? $request->user('web');


        # Cursos mmus del usuario y unirodadas.
        $workshops = $user->workshops()
            ->WherePivotNull('paid')
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->whereNotIn('name', $courses)
            ->pluck('workshops.id');


        # Se eliminan los cursos a los que no haya asistido y a
        # aquellos que haya eliminado del modal.
        $user->workshops()->detach($workshops);

        # Guarda en el log los cursos eliminados.
        Log::info('Se han desasociado los siguientes cursos: ', $workshops->toArray());
        Log::info('Para el usuario: '.$user->email);
        Log::info('Cursos que se va a inscribir: '.$courses);
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

            # Actualiza los datos del aspirante, en caso de que se haya
            # inscrito a la unirodada.
            else if ($workshop_model->name === 'Unirodada cicloturística a la Cañada del Lobo')

                $this->unirodada_controller->registerUser($request, $user, $workshop_model);
            else
                $user->assignWorkshop($workshop_model->id);

        }

        # Obtiene los cursos registrados.
        $workshops = $user->workshops()
            ->wherePivotNull('assisted_to_workshop')
            ->orWherePivot('assisted_to_workshop', false)
            ->get();

        # Si el usuario registró más de un curso, se
        # le envía un correo electrónico de confirmación.
        if ($workshops->count() > 0)
        {
            Log::info('Se ha registrado a los siguientes cursos: ', $workshops->toArray());
            Log::info('Al usuario: '.$user->email);


        }
        if($request->checkedFecha!=[]){
            $workshop_model = Workshop::firstWhere('name', 'Agricultura urbana ¿Qué? ¿Cuándo? ¿Cómo? ¿Por qué?(27 Noviembre)');
            $user->assignWorkshop($workshop_model->id);
            Mail::to($user)->send(new RegisteredWorkshops($workshop_model));
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Workshop::all();
    }
    public function getAllWorkshops(){

        return response()->json(Workshop::all());
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerWorkShop(Request $request)
    {

        $workshop = new Workshop();
        $workshop->name=$request->nombreT;
        $workshop->description=$request->DescripcionT;
        $workshop->type=$request->TEvento;
        $workshop->work_edge=$request->Eje;
        $workshop->start_date=$request->FechaInicio;
        $workshop->end_date=$request->FechaFin;
        $workshop->save();
        Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
}
//*
    public function RegistrarUnihuertoCasaUsuario(Request $request){
        try{
            //throw new \Exception("mi excepcion");//para prueba

            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);
            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if($request->NAcademico != ""){
                $user->academic_degree = $request->NAcademico;
            }
            if($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si"){
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if($request->isAsistencia == "Si" || $request->isAsistencia == "si"){
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. checamos si requiere factura
            if($request->isFacturaReq == "Si" || $request->isFacturaReq == "si"){
                DB::table('invoice_data')
                        ->updateOrInsert([
                            'user_id' => $user->id,
                            'user_type' => $user->type
                        ],[
                            'rfc' => $request->RFC,
                            'name' => $request->nombresF,
                            'email' => $request->emailF,
                            'address' =>  $request->DomicilioF,
                            'phone' => $request->telF
                        ]);
            }
            //3. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 9, // 9 = unihuerto en casa
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
        }catch(\Exception $e){
            return response()->json([ 'Message' => $e->getMessage() ],500);
        }

        //4. si todo sale bien regresamo un ok
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
    }
    //*/
    public function ChecarUnihuertoCasaUsuario(Request $request){//Esta inscrito?
        //return response()->json($request, JsonResponse::HTTP_OK);
        $insc = DB::table('user_workshop')
            ->where('workshop_id',9)
            ->where('user_id',$request->Clave)
            ->get();

        //return response()->json($insc, JsonResponse::HTTP_OK);

        if( $insc->count() > 0 ){
            return response()->json(true, JsonResponse::HTTP_OK);
        }else{
            return response()->json(false, JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarUnitruequeUsuario(Request $request){
        //return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try{
            //throw new \Exception("mi excepcion");//para prueba

            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);
            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if($request->NAcademico != ""){
                $user->academic_degree = $request->NAcademico;
            }
            if($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si"){
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if($request->isAsistencia == "Si" || $request->isAsistencia == "si"){
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 10, // 10 = unitrueque
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);
            //3. creaamos registro para la uniformacion en tabla unitrueque_user
            $ws = DB::table('user_workshop')
            ->where('workshop_id',10)
            ->where('user_id',$user->id)
            ->get();

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 10 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
        }catch(\Exception $e){
            return response()->json([ 'Message' => $e->getMessage() ],500);
        }

        //3. si todo sale bien regresamo un ok
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
    }
    //*/
    public function ChecarUnitruequeUsuario(Request $request){//Esta inscrito?
            $insc = DB::table('user_workshop')
            ->where('workshop_id',10)
            ->where('user_id',$request->Clave)
            ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);
            
            if( $insc->count() > 0 ){
                return response()->json(true, JsonResponse::HTTP_OK);
            }else{
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        
    }
    public function RegistrarHuertoMesaHuastecaUsuario(Request $request){
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try{
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if($request->NAcademico != ""){
                $user->academic_degree = $request->NAcademico;
            }
            if($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si"){
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if($request->isAsistencia == "Si" || $request->isAsistencia == "si"){
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 13, // 12 = del huerto a la mesa huasteca 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id',13)
                ->where('user_id',$user->id)
                ->get();
                /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        }catch(\Exception $e){
            return response()->json([ 'Message' => $e->getMessage() ],500);
        }
        

        //3. si todo sale bien regresamo un ok
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
    }
    public function ChecarHuertoMesaHuastecaUsuario(Request $request){//Esta inscrito?
        try{
            $insc = DB::table('user_workshop')
            ->where('workshop_id',13) 
            ->where('user_id',$request->Clave)
            ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);
            
            if( $insc->count() > 0 ){
                return response()->json(true, JsonResponse::HTTP_OK);
            }else{
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        }catch(\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }
    public function RegistrarPromotoresHuastecaUsuario(Request $request){
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try{
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if($request->NAcademico != ""){
                $user->academic_degree = $request->NAcademico;
            }
            if($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si"){
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if($request->isAsistencia == "Si" || $request->isAsistencia == "si"){
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 14, // 11 = promotores huasteca 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id',14)
                ->where('user_id',$user->id)
                ->get();
                /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        }catch(\Exception $e){
            return response()->json([ 'Message' => $e->getMessage() ],500);
        }
        

        //3. si todo sale bien regresamo un ok
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
    }
    public function ChecarPromotoresHuastecaUsuario(Request $request){//Esta inscrito?
        try{
            $insc = DB::table('user_workshop')
            ->where('workshop_id',14) 
            ->where('user_id',$request->Clave)
            ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);
            
            if( $insc->count() > 0 ){
                return response()->json(true, JsonResponse::HTTP_OK);
            }else{
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        }catch(\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }

    public function RegistrarHuertoMesaUsuario(Request $request){
        // return response()->json([ 'Hola' ], JsonResponse::HTTP_OK);
        try{
            //throw new \Exception("mi excepcion");//para prueba
            //0. validar datos
            $request->validate([
                'Clave' => 'Required' //solo la clave porque es lo que realmente nos importa
            ]);

            //1. actualizar datos del usuario
            $user = User::find($request->Clave);
            if($request->NAcademico != ""){
                $user->academic_degree = $request->NAcademico;
            }
            if($request->InteresAsistencia == "Si" || $request->InteresAsistencia == "si"){
                $user->interested_on_further_courses = true;
                $user->comments = $request->ComentariosSugerencias;
            }
            if($request->isAsistencia == "Si" || $request->isAsistencia == "si"){
                $user->courses = $request->CursosC;
            }
            $user->save();
            //2. crear registro
            DB::table('user_workshop')
                ->updateOrInsert([
                    'workshop_id' => 11, // 11 = del huerto a la mesa 
                    'user_id' => $user->id,
                    'user_type' => $user->type,
                    'assisted_to_workshop' => null,
                    'sent' => null,
                    'sent_at' =>  null,
                    'paid' => null,
                    'paid_at' => null
                ]);

            $ws = DB::table('user_workshop')
                ->where('workshop_id',11)
                ->where('user_id',$user->id)
                ->get();
                /*
            //3. creaamos registro para la uniformacion en tabla unitrueque_user (solo crear nueva tabla cuando se necesite)

            DB::table('unitrueque_users')
                ->updateOrInsert([
                    'user_workshop_id' => $ws[0]->id, // 11 = unitrueque
                    'MaterialesIntercambio' => $request->MaterialesIntercambio,
                    'Mobiliario' => $request->Mobiliario,
                    'Cantidad' => $request->Cantidad,
                    'EmpresaParticipante' => $request->EmpresaParticipante,
                ]);
            Log::info('El usuario con id '.$request->idUser. "registro un nuevo workshop ");
            */
        }catch(\Exception $e){
            return response()->json([ 'Message' => $e->getMessage() ],500);
        }
        

        //3. si todo sale bien regresamo un ok
        return response()->json([ 'Message' => 'Curso registrado' ], JsonResponse::HTTP_OK);
    }
    //*/
    public function ChecarHuertoMesaUsuario(Request $request){//Esta inscrito?
        try{
            $insc = DB::table('user_workshop')
            ->where('workshop_id',11)
            ->where('user_id',$request->Clave)
            ->get();

            //return response()->json($insc, JsonResponse::HTTP_OK);
            
            if( $insc->count() > 0 ){
                return response()->json(true, JsonResponse::HTTP_OK);
            }else{
                return response()->json(false, JsonResponse::HTTP_OK);
            }
        }catch(\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_OK);
        }
    }
}
