<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use XMLWriter;

class UspsShipping implements Shipping
{
    protected $url = 'https://secure.shippingapis.com/ShippingAPI.dll?API=Verify&XML=';
  
    public function __construct(protected string $user_id, $client)
    {
      $this->user_id = $user_id;
      $this->client = $client;
    }

    public function validateTracking()
    {

    }

    public function validateAddress($address)
    {

        $xw = new XMLWriter();
        $xw->openMemory();
        // $xw->startDocument();

        // <AddressValidateRequest USERID="XXXXXXXXXXXX">
        $xw->startElement("AddressValidateRequest");
        $xw->writeAttribute("USERID", $this->user_id);

        // <Revision>1</Revision>
        $xw->startElement("Revision");
        $xw->text("1");
        $xw->endElement();

        // <Address ID="0">
        $xw->startElement("Address");
        $xw->writeAttribute("ID", "0");


        // <Address1>SUITE K</Address1>
        $xw->startElement("Address1");
        $xw->text($address->address1);
        $xw->endElement();

        // <Address2>29851 Aventura</Address2>
        $xw->startElement("Address2");
        if(!empty($address->address2))
        {
            $xw->text($address->address2);
        }
        $xw->endElement();

        // <City />
        $xw->startElement("City");
        if(!empty($address->city))
        {
            $xw->text($address->city);
        }
        $xw->endElement();

        // <State>CA</State>
        $xw->startElement("State");
        if(!empty($address->state))
        {
            $xw->text($address->state);
        }
        $xw->endElement();

        // </Zip5>
        $xw->startElement("Zip5");
        if(!empty($address->zip5))
        {
            $xw->text($address->zip5);
        }
        $xw->endElement();

        // </Zip4>
        $xw->startElement("Zip4");
        if(!empty($address->zip4))
        {
            $xw->text($address->zip4);
        }
        $xw->endElement();

        // </Address>
        $xw->endElement();

        // </AddressValidateRequest>
        $xw->endElement();

        try {
            $response = $this->client->get($this->url.$xw->outputMemory());
        } catch(RequestException $e) {
            if($e->hasResponse()) {
                dd($e->getResponse());
            }
        }

        // $response
       $xml = simplexml_load_string($response->getBody()->read(1024));

       return json_encode($xml);

    }

    public function getTrackingInfo()
    {

    }
}
