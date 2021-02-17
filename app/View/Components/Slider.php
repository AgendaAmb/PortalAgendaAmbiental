<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Slider extends Component
{
    public $imagenes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rutaImagenes)
    {
        $this->imagenes = array_map
        (
            fn($imagen) => Storage::url($imagen),
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
