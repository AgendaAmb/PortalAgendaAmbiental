<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailLayout extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Mensaje.
     *
     * @var string
     */
    public $subject;

    /**
     * Mensaje.
     *
     * @var string
     */
    public $message;

    /**
     * Layouts de correo.
     *
     * @var string[]
     */
    public $layouts = [
        'Gestión' => 'mail.gestion.layout' ,
        'Educación' => 'mail.educacion.layout' ,
        'Vinculación' => 'mail.vinculacion.layout',
        'Comunicación' => 'mail.comunicacion.layout',
        'RTIC' => 'mail.rtic.layout'
    ];

    /**
     * Layouts de correo.
     *
     * @var string
     */
    public $layout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message = null, $layout = 'RTIC', $subject = 'Notificación de Mi Portal de Agenda Ambiental')
    {
        $this->message = $message;
        $this->layout = $layout;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->markdown($this->layouts[$this->layout], ['content' => $this->message]);
    }
}
