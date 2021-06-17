<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

/**
 * Componente que permite representar un slider, que puede o no
 * pertenecer a un tab-panel.
 */
class Slider extends Component
{
    /**
     * Id del slider.
     *
     * @property string.
     */
    public $idSlider;

    /**
     * Bandera para determinar si el slider es transitable.
     *
     * @property bool
     */
    public $transitable;

    /**
     * Descripción del slider.
     *
     * @property string
     */
    public $descripcion;

    /**
     * Título del slider
     * @property string
     */
    public $titulo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $idSlider,
        $transitable = false,
        $descripcion = null,
        $titulo=null
    ){
        $this->idSlider = $idSlider;
        $this->transitable = $transitable;
        $this->descripcion=$descripcion;
        $this->titulo=$titulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
