<?php

namespace App\Services;

use GuzzleHttp\Client;

interface Shipping
{
    public function validateTracking();
    public function validateAddress($address);
    public function getTrackingInfo();
}
