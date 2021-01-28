<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArtisanItemCard extends Component
{

    public $artisan;

    public function __construct($artisan)
    {
        $this->artisan = $artisan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.artisan-item-card');
    }
}
