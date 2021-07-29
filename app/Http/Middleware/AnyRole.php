<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AnyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var App/Models/Auth/User */
        $user = Auth::user();

        # Deniega el acceso a usuarios sin un rol.
        if ($user->roles()->count() === 0)
            return abort(403, 'Unauthorized to access');

        return $next($request);
    }
}
