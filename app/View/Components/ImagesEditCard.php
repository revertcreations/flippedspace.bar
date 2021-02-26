<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImagesEditCard extends Component
{
    public $images;
    public $catalogKey;

    public function __construct($images, $catalogKey)
    {
        $this->images = $images;
        $this->catalogKey = $catalogKey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.images.images-edit-card');
    }
}
