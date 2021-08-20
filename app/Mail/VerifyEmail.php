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
     * Registered user.
     * @var \App\Models\Auth\User
     */
    public $user;

    /**
     * Email verification url.
     * @var string
     */
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $verification_url)
    {
        $this->user = $user;
        $this->url = $verification_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.email')
            ->subject('Verifica tu dirección de correo electrónico')
            ->with('user', $this->user)
            ->with('url', $this->url)
            ->with('level', '')
            ->with('introLines', [])
            ->with('outroLines', []);
    }
}
