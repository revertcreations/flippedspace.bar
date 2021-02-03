<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImagesEditCard extends Component
{
    public $images;
    public $usersArtisanColorwayId;
    public $artisanColorwayId;

    public function __construct($images, $usersArtisanColorwayId, $artisanColorwayId)
    {
        $this->images = $images;
        $this->usersArtisanColorwayId = $usersArtisanColorwayId;
        $this->artisanColorwayId = $artisanColorwayId;
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
