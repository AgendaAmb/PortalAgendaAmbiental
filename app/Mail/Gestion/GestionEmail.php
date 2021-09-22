<?php

namespace App\Mail\Gestion;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GestionEmail extends Mailable
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
        return $this->from('unibici@uaslp.mx', 'Laura Daniela Hernández Rodríguez')
            ->subject('Registro a la unirodada a la Cañada del Lobo')->markdown('mail.gestion.layout', [
            'header_color' => '#87b854',
            'footer_color' => 'white',
            'with_image' => false,
        ]);
    }
}
