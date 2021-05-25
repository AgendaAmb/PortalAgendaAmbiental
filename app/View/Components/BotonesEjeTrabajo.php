<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BotonesEjeTrabajo extends Component
{
    // Número de renglones para los botones.
    public $nRenglones;

    // Número de columnas para los botones.
    public $nColumnas;

    // Número de páginas por botón.
    public $nPaginas;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nRenglones, $nColumnas, $nPaginas)
    {
        $this->nRenglones = $nRenglones;
        $this->nColumnas = $nColumnas;
        $this->nPaginas = $nPaginas;
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
