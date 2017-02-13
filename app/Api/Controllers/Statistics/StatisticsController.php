<?php

namespace Api\Controllers\Statistics;

use Illuminate\Support\Facades\Input;
use Services\JobRequest\JobRequestService;

class StatisticsController {

    protected $service;

    public function __construct(JobRequestService $service) {
        $this->service = $service;
    }

    public function totals() {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');
        
        $jobType = $this->service->getJobType();
        $totals = [];
        foreach ($jobType as $key => $job){
            $job_type_totals = $this->service->getJobTypeTotals($job->id, 'pending');
            $totals[$key]['name'] = $job->name;
            $totals[$key]['count'] = $job_type_totals;
        }

        return response()->json($totals);
    }
    
    public function geocodes(){
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');
        
        $regions = $this->service->getRegions();
        $geos = [];
        $i = 0;
        foreach ($regions as $region){
            $jobByRegion = $this->service->getJobByRegion($region->id, 'pending');
            if(!empty($jobByRegion)){

                $maps_url = 'https://'.'maps.googleapis.com/'.'maps/api/geocode/json'.'?address=' . urlencode($region->name.',Australia');
                $maps_json = file_get_contents($maps_url);
                $maps_array = json_decode($maps_json, true);
//                $lat = $maps_array['results'][0]['geometry']['location']['lat'];
//                $lng = $maps_array['results'][0]['geometry']['location']['lng'];
                $geos[$i]['name'] = $region->name;
                $geos[$i]['count'] = $jobByRegion;
                $geos[$i]['lat'] = $maps_array['results'][0]['geometry']['location']['lat'];
                $geos[$i]['lag'] = $maps_array['results'][0]['geometry']['location']['lng'];
                $i ++;
            }
        }
        
        return response()->json($geos);
    }

}
