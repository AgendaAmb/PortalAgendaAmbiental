<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class BotonAcordeon extends Component
{
    public $fotoItem;
    public $textoItem;
    public $linkReferencia;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fotoItem=null, $textoItem, $linkReferencia)
    {
        if($fotoItem==null){
           
        }else{
            $this->fotoItem = Storage::url($fotoItem);
        }
        $this->textoItem = $textoItem;
        $this->linkReferencia = $linkReferencia;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.boton-acordeon');
    }
}
