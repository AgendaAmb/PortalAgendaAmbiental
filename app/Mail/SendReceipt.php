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
        return $this->from('rtic.ambiental@uaslp.mx', 'Laura Daniela Hernández Rodríguez')
                    ->subject('Registro a la unirodada a la Cañada del Lobo')
                    ->markdown('mail.workshops.send-receipt')
                    ->attachData($this->receipt, 'Ficha de pago.pdf', [
                        'mime' => 'application/pdf',
                        'header_color' => '#87b854'
                    ]);
    }
}
