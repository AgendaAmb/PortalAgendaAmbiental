<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BotonesEjeTrabajo extends Component
{
    /**
     * Bandera para determinar si la parte inferior del componente
     * contendrá imágenes.
     * @property bool
     */
    public $contieneImagenes;

    /**
     * Bandera para determinar si la parte inferior del componente
     * contendrá texto.
     * @property bool
     */
    public $contieneTexto;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contieneImagenes = false, $contieneTexto = false)
    {
        $this->contieneImagenes = $contieneImagenes;
        $this->contieneTexto = $contieneTexto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.botones-eje-trabajo');
    }
}
