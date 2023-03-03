<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendslowFashion extends Mailable
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
        return $this->from('gestion.ambiental@uaslp.mx', 'SlowFashion')
                    ->subject('Registro al Curso: '. $this->ws_name)
                    ->markdown('mail.workshops.send-receipt-slowfashion', [
                        'header_color' => '#87b854',
                        'footer_color' => 'white',
                        'with_image' => false
                    ])
                    ->attachData($this->receipt, 'Ficha de pago.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
