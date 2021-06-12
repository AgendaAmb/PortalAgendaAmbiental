<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabPanelImage extends Component
{
    /**
     * URL de la imagen del TabPanel
     * @property string
     */
    public $imageURL;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageURL = null)
    {
        $this->imageURL = $imageURL;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tab-panel-image');
    }
}
