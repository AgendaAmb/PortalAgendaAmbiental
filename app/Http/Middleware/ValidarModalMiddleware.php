<?php

namespace App\Http\Middleware;

use Closure;

class ValidarModalMiddleware
{
    public function handle($request, Closure $next)
    {
        $nombreModal = $request->route('nombreModal');

        // Define una lista de nombres de modales válidos
        $modalesValidos = ['SemanaSostenible', 'OtroModal']; // Agrega aquí los nombres de tus modales válidos

        if (in_array($nombreModal, $modalesValidos)) {
            return $next($request);
        }

        return redirect()->route('Index'); // Redirige a la vista principal si el modal no es válido
    }
}
