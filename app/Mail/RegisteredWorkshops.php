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
    public function __construct($workshops, $receipt)
    {
        $this->workshops = $workshops;
        $this->receipt = $receipt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtic.ambiental@uaslp.mx', 'Portal de Agenda Ambiental')
                    ->subject('Confirmación de pre-registro a cursos/talleres')
                    ->markdown('mail.workshops.send-receipt-uniruta', [
                        'workshops' => $this->workshops,
                    ])
                    ->attach(public_path('attachments/carta_responsiva_uniruta.pdf'));
    }
}
