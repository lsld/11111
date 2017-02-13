<?php

namespace App\Events;

use App\Models\JobRequests;
use App\Models\Region;
use App\Models\States;

class AddingHirerJob extends \Event
{
    public $job;
    public $address;

    public function __construct(JobRequests $job)
    {
        $this->job = $job;
        $this->address = $this->getAddress($job);
    }

    private function getAddress($job)
    {
        $address = $job->street_address;
        $address .= $job->suburb;
        $address .= $job->post_code;
        $address .= Region::find($job->regions_id)->name;
        $address .= States::find($job->state_id)->name;
        return $address;
    }
}