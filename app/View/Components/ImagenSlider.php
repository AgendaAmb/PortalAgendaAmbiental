<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImagenSlider extends Component
{
    /**
     * Determina si la imagen es la primer imagen del slider
     * @property bool
     */
    public $primerImagen;

    /**
     * Link al cual lleva la imagen, cuando se le da clic
     * @property string
     */
    public $linkRedireccion;

    /**
     * Link de la ubicación de la imagen
     * @property string
     */
    public $linkImagen;

    /**
     * Ancho de la imagen.
     * @property string
     */
    public $ancho;

    /**
     * Altura de la imagen.
     * @property string
     */
    public $alto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($primerImagen = false, $linkRedireccion = null, $linkImagen, $ancho = null, $alto = null)
    {
        $this->primerImagen = $primerImagen;
        $this->linkRedireccion = $linkRedireccion;
        $this->linkImagen = $linkImagen;
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.imagen-slider');
    }
}
