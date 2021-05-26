<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Slider extends Component
{
    public $idSlider;
    public $imagenes;
    public $sliderTabPane;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idSlider, $rutaImagenes, $sliderTabPane = false)
    {
        $this->idSlider = $idSlider;
        $this->imagenes = Storage::files($rutaImagenes);
        $this->sliderTabPane = $sliderTabPane;

        dd($this->imagenes);
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
