<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ODSWheel extends Component
{
    public $ejeTrabajo;
    public $imgEjesTrabajo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ejeTrabajo = 0)
    {
        $this->ejeTrabajo = $ejeTrabajo;
        $this->imgEjesTrabajo = [
            'gestion.webp',
            'educacion.webp',
            'vinculacion.webp',
            'comunicacion.webp'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.o-d-s-wheel');
    }
}
