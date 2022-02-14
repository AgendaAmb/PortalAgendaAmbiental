<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
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
                    ->subject('Registro al Curso-Taller: Unihuerto en casa 2022')
                    ->markdown('mail.workshops.send-receipt', [
                        'header_color' => '#87b854',
                        'footer_color' => 'white',
                        'with_image' => false
                    ])
                    ->attachData($this->receipt, 'Ficha de pago.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
