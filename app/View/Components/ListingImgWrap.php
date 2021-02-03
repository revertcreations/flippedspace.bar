<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListingImgWrap extends Component
{
    public $usersArtisanColorwayId;
    public $artisanColorwayId;
    public $images;
    public $alt;
    public $type;

    public function __construct($images, $usersArtisanColorwayId, $artisanColorwayId, $alt, $type)
    {

        $this->usersArtisanColorwayId = $usersArtisanColorwayId;
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
