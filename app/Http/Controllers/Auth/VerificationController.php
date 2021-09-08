<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\User;
use App\Models\Auth\Worker;
use App\Models\Module;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,workers,students')->except('verify', 'verifyWithModal');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        $user = Extern::find($request->route('id'))
            ??  Student::find($request->route('id'))
            ??  Worker::find($request->route('id'));

        $redirectUrl = $this->redirectPath();


        if ($user === null){
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('id'), (string) $user->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->nombreModal !== null) {
            $redirectUrl .= '?nombreModal='.$request->nombreModal;
        }

        Auth::guard($user->guard)->login($user);

        if ($user->hasVerifiedEmail()) {
            return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect($redirectUrl)
            ->with('verified', true)
            ->with('nombreModal', $request->nombreModal);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        if ($response = $this->verified($user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect($redirectUrl)
                    ->with('verified', true)
                    ->with('nombreModal', $request->nombreModal);
    }

    /**
     * The user has been verified.
     *
     * @param  \App\Models\Auth\User  $user
     * @return mixed
     */
    protected function verified(User $user)
    {
        # Redirecciona a los usuarios de control escolar a dicho módulo.
        if ($user->hasModule('Control Escolar'))
        {
            # Recupera el módulo.
            $module = Module::firstWhere('name', 'Control Escolar');

            return redirect($module->url);
        }
    }
}
