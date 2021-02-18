<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class ContenedorBotones extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idContenedor;
    public $informacionBotones;

    public function __construct($idContenedor)
    {
        $this->idContenedor = $idContenedor;
        $this->informacionBotones = json_decode
        (
            Storage::disk('local')->get('InformacionComponentes/Botones.json'),
            true
        )[$idContenedor];

        foreach ($this->informacionBotones as $nombreBoton => $contenidos)
        {
            $contenidos['FotoBoton'] = Storage::url($contenidos['FotoBoton']);
            $this->informacionBotones[$nombreBoton] = $contenidos;
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.contenedor-botones');
    }
}
