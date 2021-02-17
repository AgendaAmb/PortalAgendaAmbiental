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
        $json = Storage::disk('local')->get('InformacionComponentes/Botones.json');

        $this->idContenedor = $idContenedor;$this->informacionBotones = [];
        /*$this->informacionBotones = array_map
        (
            fn($informacionBoton) => Storage::url($informacionBoton[0]),
            json_decode($json, true)[$idContenedor]
        );*/
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
