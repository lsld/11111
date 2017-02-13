<?php

namespace App\Listeners;

use App\Models\AddressCoordinates\AddressCoordinate;

class UpdateGeoCode
{
    protected $geoCoder;

    public function __construct()
    {
        $this->geoCoder = app('geocoder');
    }

    public function handle($event)
    {
        try {
            $address = $event->address;
            $result = $this->geoCoder->geocode($address)->all();
            if (count($result)) {
                $result = $result[0];
                $addressCoordinates = new AddressCoordinate();
                $addressCoordinates->fill([
                    'latitude' => $result->getLatitude(),
                    'longitude' => $result->getLongitude()
                ]);
                $event->job->addressCoordinates()->save($addressCoordinates);
            }
            return true;
        } catch (\Exception $e) {

        }
    }
}