<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListingImgWrap extends Component
{

    public $artisanColorwayId;
    public $images;
    public $alt;
    public $type;

    public function __construct($images, $artisanColorwayId, $alt, $type)
    {

        $this->artisanColorwayId = $artisanColorwayId;
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
        return view('components.listings.listing-img-wrap');
    }
}
