<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardImgWrap extends Component
{

    public $catalogKey;
    public $category;
    public $images;
    public $alt;
    public $type;

    public function __construct($images, $category, $catalogKey, $alt, $type)
    {
        $this->category = $category;
        $this->catalogKey = $catalogKey;
        $this->images = $images;
        $this->alt = $alt;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card.img-wrap');
    }
}
