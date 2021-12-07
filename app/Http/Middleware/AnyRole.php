<?php

namespace App\Http\Middleware;

use App\Models\Auth\User;
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
        $user = Auth::guard('workers')->user()
            ?? Auth::guard('students')->user()
            ?? Auth::guard('web')->user();

        $user = User::where('id', $user->id)->where('type', $user->type)->first();

        # Deniega el acceso a usuarios sin un rol.
        if ($user !== null && $user->roles()->count() === 0)
            return abort(403, 'Unauthorized to access');

        return $next($request);
    }
}
