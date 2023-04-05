<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredMiniRodada extends Mailable
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
        return $this->from('rtic.ambiental@uaslp.mx', 'UNIBICI')
                    ->subject('Confirmación de registro a MiniRodada 2023')
                    ->markdown('mail.workshops.send-minirodada', [
                        'workshops' => $this->workshops,
                    ])
                    ->attach(public_path('attachments/Carta_responsiva_Minirodada.pdf'));
    }
}

