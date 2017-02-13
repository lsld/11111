<?php

namespace Web\Controllers\Dashboard;

use Illuminate\Support\Facades\View;
use Services\Matching\MatchingService;
use Web\Controllers\Controller;

class DashboardController extends Controller
{
    private $matchingJobs;

    public function __construct(MatchingService $matchingJobs)
    {
        $this->matchingJobs = $matchingJobs;
    }

    public function viewDashboard()
    {
        $coordinates = [];
        $newJobs = $this->matchingJobs->matchJobsAndNotifications(user()->tenant_id);
        $newJobs->each(function ($job) use (&$coordinates) {
            $addressCoordinates = $job->addressCoordinates;
            if (empty($addressCoordinates)) {
                return true;
            }
            $coordinates[] = [
                $job->entity_type,
                $addressCoordinates->latitude,
                $addressCoordinates->longitude,
            ];
        });
        $coordinates = json_encode($coordinates);
        $quotedJobs = $this->matchingJobs->getPendingQuotes(user()->tenant_id);
        $newJobCount = $newJobs->count();
        $quotedJobCount = $quotedJobs->count();
        $counts = [
            'total' => ($newJobCount + $quotedJobCount),
            'new_jobs' => $newJobCount,
            'quoted_jobs' => $quotedJobCount,
        ];
        return View::make('dashboards.supplier-dashboard', compact('coordinates', 'counts'));
    }
}