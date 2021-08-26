<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Acordeon extends Component
{
    public $idAcordeon;
    public $tituloAcordeon;
    public $componentesAcordeon;
    public $haveStyle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idAcordeon, $tituloAcordeon,$haveStyle=false)
    {
        $json = Storage::disk('local')->get('InformacionComponentes/Acordeones.json');

        $this->idAcordeon = $idAcordeon;
        $this->tituloAcordeon = $tituloAcordeon;
        $this->haveStyle=$haveStyle;
        $this->componentesAcordeon = json_decode($json, true)[$idAcordeon];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.acordeon');
    }
}
