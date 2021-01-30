<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListingImgWrap extends Component
{
    public $images;
    public $alt;

    public function __construct($images, $alt)
    {
        $this->images = $images;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.listings.listing-img-wrap');
    }
}
