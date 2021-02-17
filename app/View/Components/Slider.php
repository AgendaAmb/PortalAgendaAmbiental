<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Slider extends Component
{
    public $idSlider;
    public $imagenes;

    function obtenUrlImagen($rutaImagen)
    {
        return Storage::url($rutaImagen);
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idSlider, $rutaImagenes)
    {
        $this->idSlider = $idSlider;
        $this->imagenes = array_map
        (
            array($this, 'obtenUrlImagen'), 
            Storage::disk('public')->allFiles($rutaImagenes)
        );
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
