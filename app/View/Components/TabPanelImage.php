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
    public $urlhref;
    public $isBlank;
    public $isDownload;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageURL = null,$urlhref = null,$isBlank=false,$isDownload=false )
    {
        $this->imageURL = $imageURL;
        $this->urlhref=$urlhref;
        $this->isBlank=$isBlank;
        $this->isDownload=$isDownload;
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
