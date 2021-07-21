<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutShippingInfo extends Component
{
    public $listing;

    public function render()
    {
        return view('livewire.checkout-shipping-info');
    }
}
