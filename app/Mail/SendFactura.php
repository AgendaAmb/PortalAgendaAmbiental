<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFactura extends Mailable
{
    use Queueable, SerializesModels;

    public $receipt;
    public $ws_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receipt,$ws_name)
    {
        $this->receipt = $receipt;
        $this->ws_name = $ws_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtic.ambiental@uaslp.mx', 'Dra. Mariana Buendía Oliva')
                    ->subject('Comprobante de Pago: '. $this->ws_name)
                    ->markdown('mail.workshops.send-factura', [
                        'header_color' => '#87b854',
                        'footer_color' => 'white',
                        'with_image' => false
                    ])
                    ->attachData($this->receipt, 'Factura_de_pago.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
