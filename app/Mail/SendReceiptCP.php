<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReceiptCP extends Mailable
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
        return $this->from('gestion.ambiental@uaslp.mx', 'UNIRUTA')
                    ->subject('Registro a la Uniruta Cerro de San Pedro')
                    ->markdown('mail.workshops.send-receipt-uniruta', [
                        'header_color' => '#87b854',
                        'footer_color' => 'white',
                        'with_image' => false
                    ])
                    ->attachData($this->receipt, 'Ficha de pago.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
