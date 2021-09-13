<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Envía el comprobante de pago a un administrativo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param object    $courses
     * @return \Illuminate\Http\Response
     */
    public function verComprobante(Request $request, $userType, $userId, $fileName)
    {
        try 
        {
            # Crea la ruta al archivo.
            $userPath = implode('/', [ $userType, $userId, $fileName ]);

            # Obtiene el archivo.
            $filepath = Storage::path('workshops/'.$userPath);

            # Devuelve el archivo.
            return response()->file($filepath);
        }
        catch (Exception $e) 
        {
            return abort(502, 'Archivo no encontrado');
        }
    }
}
