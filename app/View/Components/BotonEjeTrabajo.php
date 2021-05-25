<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BotonEjeTrabajo extends Component
{
    // Id del botón.
    public $idBoton;

    // Nombre del botón.
    public $nombreBoton;

    // Id del slider al cual hace referencia.
    public $idSlider;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idBoton, $nombreBoton, $idSlider)
    {
        $this->idBoton = $idBoton;
        $this->nombreBoton = $nombreBoton;
        $this->idSlider = '#'.$idSlider;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.boton-eje-trabajo');
    }
}
