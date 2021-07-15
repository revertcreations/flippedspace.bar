<?php

namespace App;

use GuzzleHttp\Client;

class ShippingCarrierGateway
{
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function validateTracking()
    {

    }

    public function validateAddress($address)
    {
        dd('here');
    }

    public function getTrackingInfo()
    {

    }

}
