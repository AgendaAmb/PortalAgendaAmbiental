<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredWorkshops extends Mailable
{
    use Queueable, SerializesModels;

    public $workshops;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($workshops)
    {
        $this->workshops = $workshops;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Portal de Agenda Ambiental')
                    ->subject('Confirmación de registro a cursos/talleres')
                    ->markdown('mail.workshops.registered-workshops', [
                        'workshops' => $this->workshops,
                    ]);
    }
}
