<?php

namespace App\Http\Controllers;

use App\Models\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        // ! El servico de fianzas es solo accesible 
        // ! mediante la ip del servidor windows server 2012 (128.224.134.160)
        // ! por lo cual es necesario utilizar un proxy en esa maquina.

        $base_url=''; // * Produccion
        $soap_url='https://www.finanzas.uaslp.mx/ConsultasFinanzas/Agenda.asmx?wsdl';
        
        if(env('APP_ENV') != 'production')$base_url = 'http://148.224.252.206:6987/load/?url=';

        $url = $base_url . $soap_url;

        // dd($url);

        try{
            // $client = new \SoapClient($url);
            $client = new \SoapClient("https://www.finanzas.uaslp.mx/ConsultasFinanzas/Agenda.asmx?wsdl");
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // dd($client->__getTypes());
        // dd($client->__getFunctions());
        $response = $client->__soapCall('DatosAlumno', array('CVE_UNICA' => '291395'));

        return $response;
        // return redirect()->route('login');
    }
}
