<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredToMMUSConference extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtic.ambiental@uaslp.mx', 'Portal de Agenda Ambiental')
                    ->subject('Enlace conferencia “Movilidad y Urbanismo con enfoque de género” MMUS2021')
                    ->markdown('mail.modules.registered-to-17-gemas');
    }
}
