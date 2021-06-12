<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabPanelText extends Component
{
    /**
     * Texto del componente
     *  @property string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = null)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tab-panel-text');
    }
}
