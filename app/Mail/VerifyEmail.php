<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User module.
     * @var \App\Models\Module
     */
    public $module;

    /**
     * User module.
     * @var \App\Models\Auth\User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($module, $user)
    {
        $this->module = $module;
        $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $introLines = [ 
            'Te pedimos por favor verifiques tu correo electrónico en el módulo de: '.$this->module->name,
        ];


        return $this->markdown('vendor.notifications.email')
        ->to($this->user->email)
        ->from(env('MAIL_FROM_ADDRESS'))
        ->with('greeting', 'Saludos '.$this->user->name)
        ->with('introLines', [])
        ->with('outroLines', [])
        ->with('actionUrl', route('modules.user.verify-email', [ Crypt::encrypt($this->module), Crypt::encrypt($this->user)  ]))
        ->with('level', '');
    }
}
