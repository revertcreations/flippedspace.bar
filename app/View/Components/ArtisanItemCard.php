<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArtisanItemCard extends Component
{

    public $artisan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
