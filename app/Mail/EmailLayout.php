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
        'Gestión ambiental' => 'mail.gestion.layout' ,
        'Educación' => 'mail.educacion.layout' ,
        'Vinculación' => 'mail.vinculacion.layout',
        'Comunicación' => 'mail.comunicacion.layout',
        'Administración' => 'mail.rtic.layout'
    ];

    /**
     * Layouts de correo.
     *
     * @var string
     */
    public $layout;

    /**
     * Eje de trabajo.
     *
     * @var string
     */
    public $work_edge;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $message = null,
        $work_edge = 'Administración',
        $subject = 'Notificación de Mi Portal de Agenda Ambiental',
        $layout = null
    ){
        $this->work_edge = $work_edge;
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
        $layout = $this->layout ?? $this->layouts[$this->work_edge];

        return $this
            ->subject($this->subject)
            ->markdown($layout, ['content' => $this->message]);
    }
}
