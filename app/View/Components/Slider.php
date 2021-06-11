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
     * Constante del directorio, en donde se guardan
     * las fotos por cada slider.
     *
     * @property static FOLDER_SLIDER
     */
    private static $FOLDER_SLIDER = 'slider';

    /**
     * Constante del directorio, en donde se guardan
     * las fotos por cada slider.
     *
     * @property static FOLDER_PARTE_INFERIOR
     */
    private static $FOLDER_PARTE_INFERIOR = 'seccion-inferior';

    /**
     * Id del slider.
     *
     * @property string.
     */
    public $idSlider;

    /**
     * Bandera para determinar si el slider pertenece a un tab-panel.
     * Un tab panel es un componente con una o varias pestañas navegables.
     *
     * @property bool
     */
    public $sliderTabPane;

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
     * Imágenes del slider.
     * @property array
     */
    public $imagenes;

    /**
     * Imágenes de la sección inferior del slider.
     * @property mixed
     */
    public $imagenesParteInferior;

    /**
     * Texto de la parte inferior del slider.
     * @property string
     */
    public $textoParteInferior;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $idSlider,
        $rutaImagenes,
        $sliderTabPane = false,
        $textoParteInferior = null,
        $descripcion,
        $titulo
    ){
        $this->idSlider = $idSlider;
        $this->imagenes = Storage::disk('public')->files($rutaImagenes.'/'.self::$FOLDER_SLIDER) ?? [];
        $this->imagenesParteInferior = Storage::disk('public')->files($rutaImagenes.'/'.self::$FOLDER_PARTE_INFERIOR) ?? [];
        $this->sliderTabPane = $sliderTabPane;
        $this->descripcion=$descripcion;
        $this->titulo=$titulo;
        $this->textoParteInferior = $textoParteInferior;
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
