<?php

namespace App\Http\Controllers;

use App\ShippingCarrierGateway;
use App\Usps;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function validateAddress(Request $request)
    {

        // $address = collect([
        //     'address1' => $request->address1,
        //     'address2' => $request->address2,
        //     'city' => $request->city,
        //     'state' => $request->state,
        //     'country' => $request->country,
        //     'zip' => $request->zip,
        // ]);

        // dd($address->address1);


        $shippingCarrier = new Usps();
        $shippingCarrier->validateAddress($request);
    }
}
