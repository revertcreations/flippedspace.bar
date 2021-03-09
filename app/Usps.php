<?php

namespace App;

use XMLWriter;

class Usps extends ShippingCarrierGateway
{
    protected $user_id;
    protected $url = 'https://secure.shippingapis.com/ShippingAPI.dll?API=verifyXML=';

    public function __construct($client)
    {
        $this->user_id = config('shipping.carriers.usps.userid');
        parent::__construct( $client );
    }

    public function validateTracking()
    {

    }

    public function validateAddress($address)
    {

        $xw = new XMLWriter();
        $xw->openMemory();
        $xw->startDocument("1.0");

        // <AddressValidateRequest USERID="XXXXXXXXXXXX">
        $xw->startElement("AddressValidateRequest");
        $xw->writeAttribute("USERID", $this->user_id);

        // <Revision>1</Revision>
        $xw->startElement("Revision");
        $xw->text("1");
        $xw->endElement();

        // <Address ID="0">
        $xw->startElement("Address");

        // <Address1>SUITE K</Address1>
        $xw->startElement("Address1");
        $xw->text($address->address1);
        $xw->endElement();

        // <Address2>29851 Aventura</Address2>
        $xw->startElement("Address2");
        $xw->text($address->address1);
        $xw->endElement();

        // <City />
        $xw->startElement("City");
        $xw->text($address->city);
        $xw->endElement();

        // <State>CA</State>
        $xw->startElement("State");
        $xw->text($address->state);
        $xw->endElement();

        // </Zip5>
        $xw->startElement("Zip5");
        $xw->text($address->zip5);
        $xw->endElement();

        // </Zip4>
        $xw->startElement("Zip4");
        $xw->text($address->zip4);
        $xw->endElement();

        // </Address>
        $xw->endElement();

        // </AddressValidateRequest>
        $xw->endElement();
        dd($this);

       $response = $this->client->request('GET', $this->url);

       dd($response);

    }

    public function getTrackingInfo()
    {

    }
}
