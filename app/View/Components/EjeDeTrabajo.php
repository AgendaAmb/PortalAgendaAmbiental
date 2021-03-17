<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EjeDeTrabajo extends Component
{
    public $titulo;
    public $descripcion;
    public $imagen;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $descripcion, $imagen)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.eje-de-trabajo');
    }
}
