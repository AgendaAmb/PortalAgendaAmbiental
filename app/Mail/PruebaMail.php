<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PruebaMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('Mail.prueba');

        return $this->from('unihuerto@uaslp.mx', 'Laura Daniela Hernández Rodríguez')
            ->subject('Registro al Curso-Taller: Unihuerto en casa 2022')
            ->markdown($this->contenido);
    }
}
