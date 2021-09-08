<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $receipt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receipt)
    {
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
                    ->subject('Confirmación de registro a cursos/talleres')
                    ->markdown('mail.workshops.send-receipt')
                    ->attachData($this->receipt, 'Comprobante.pdf', [
                        'mime' => 'application/pdf'
                    ]);
    }
}
