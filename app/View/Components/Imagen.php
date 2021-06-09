<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Componente que representa una imagen. Puede contener un link hacia
 * otra página.
 */
class Imagen extends Component
{
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
    public function __construct($linkRedireccion = '#', $linkImagen, $ancho = null, $alto = null)
    {
        $this->linkRedireccion = $linkRedireccion;
        $this->linkImagen = $linkImagen;
        $this->alto = $alto;
        $this->ancho = $ancho;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.imagen');
    }
}
