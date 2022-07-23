<?php

namespace App\Http\Controllers;

use App\comite_user as AppComite_user;
use App\Models\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\ejes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Resources\AniversarioResource;
use App\Models\ComiteUser;
use App\Models\Module;

class AnniversaryController extends Controller
{
    /**
     * Display the home page for 20 anniversary
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        // Se usa para abrir un modal dentro de mi portal directamente
        $nombreModal = session('nombreModal') ?? null;

        if ($nombreModal !== null)
            $request->session()->forget('nombreModal');

        // TODO Pasar a un recurso para usar vue mas facil we
        return view('auth.20Aniversario.index')
            ->with('modulos', $request->user()->userModules) //Navbar
            ->with('user_workshops', Auth::user()->workshops) 
            ->with('workshops', Workshop::where('type','20Aniversario')->get())
            ->with('nombreModal', $nombreModal)
            ->with('ejes', ejes::all()); // para el proximo navbar au sin uso
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = Auth::user();

        // ! MODULO ACTIVADO PARA USUARIO
        $user_modules = $user->userModules;
        foreach ($user_modules as $module) {
            if($module->name == '20Aniversario'){
                return redirect()->route('20home');
            }
        }

        // * Validación con muchas inconsistencias
        try{
            // Limpiar los datos porque estan horribles
            $name = trim(strtoupper($user->middlename)) . "%" . trim(strtoupper($user->surname)) . "%" . trim(strtoupper($user->name));
            $curp = trim(strtoupper($user->curp));

            $_names = ComiteUser::where('name', 'LIKE', $name)->get();
            $_ids = ComiteUser::where('user_id', $user->id)->get();
            $_curps = ComiteUser::where('curp','LIKE',$curp)->get();

            $modulo = [
                'id' => 7,
                'name' => '20Aniversario',
                'url' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $module = Module::where('name', '20Aniversario')->get()->first();

            if(!$_names->isEmpty()){
                DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$module->id, $user->id, $user->type]);
                return redirect()->route('20home');
            }else if(!$_ids->isEmpty()) {
                DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$request->module_id, $user->id, $user->type]);
                return redirect()->route('20home');
            }else if(!$_curps->isEmpty()){
                DB::insert('insert into module_user (module_id,user_id, user_type) values (?, ?, ?)', [$request->module_id, $user->id, $user->type]);
                return redirect()->route('20home');    
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }

        return "No puedes registrarte";

    }
}
