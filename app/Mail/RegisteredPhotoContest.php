<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredPhotoContest extends Mailable
{
    use Queueable, SerializesModels;

    public $workshops;
    //public $receipt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($workshops)
    {
        $this->workshops = $workshops;
        //$this->receipt = $receipt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('imarec@uaslp.mx', 'Portal de Agenda Ambiental')
            ->subject('Confirmación de registro a curso/taller')
            ->markdown('mail.workshops.registered-photo-contest', [
                'workshops' => $this->workshops,
            ])
            ->attach(public_path('attachments/Conv_ConFotografia.pdf'), [
                'mime' => 'application/pdf',
            ]);
    }
}
