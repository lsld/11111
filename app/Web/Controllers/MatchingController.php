<?php

namespace Web\Controllers;

use Illuminate\Http\Request;
use Services\Matching\MatchingService;

class MatchingController
{
    protected $matchingService;

    public function __construct(MatchingService $matchingService)
    {
        $this->matchingService = $matchingService;
    }

    public function index()
    {
        $this->matchingService->generateNotifications();
        return;

    }

    public function notifyFormJob($job_id){
        $this->matchingService->sendNotificationsToSupplier($job_id);
    }
}
