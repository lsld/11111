<?php

namespace Services\JobRequest\Material;

use App\Constants\JobRequestStatus;
use App\Events\AddingHirerJob;
use App\Models\JobRequests;
use App\Models\Material\MaterialRequestRestData;
use Services\JobRequest\JobRequestManageService;
use Services\Matching\MatchingService;

class MaterialRequestService
{

    protected $jobRequests;
    protected $jobRequestManageService;
    protected $job_type_id = 3;
    protected $materialRequestRestData;

    public function __construct(
        JobRequests $jobRequests,
        JobRequestManageService $jobRequestManageService,
        MaterialRequestRestData $materialRequestRestData,
        MatchingService $matchingService
    ) {

        $this->jobRequests = $jobRequests;
        $this->jobRequestManageService = $jobRequestManageService;
        $this->materialRequestRestData = $materialRequestRestData;
        $this->matchingService = $matchingService;
    }

    public function storeMaterialRequestData($entity_id, $entity_type, $user_id, $data)
    {

        $expires_in = date('Y-m-d', strtotime($data['expiry_date']));

        $request = $this->jobRequests->create([
            'entity_id' => $entity_id,
            'entity_type' => $entity_type,
            'street_address' => $data['street_address'],
            'suburb' => $data['suburb'],
            'post_code' => $data['post_code'],
            'duration' => $data['duration'],
            'state_id' => $data['state_id'],
            'regions_id' => $data['regions_id'],
            'description' => $data['description'],
            'expiry_date' => $expires_in,
            'user_id' => $user_id,

            'job_type_id' => $this->job_type_id,
            'required_date' => date('Y-m-d'),
            'status' => JobRequestStatus::PENDING,
        ]);

        $request->materialRestData()->save(new MaterialRequestRestData([
            'quantity' => $data['quantity'],
            'resource_type' => $data['resource_type'],
            'condition' => $data['condition']
        ]));

        $this->matchingService->sendNotificationsToSupplier($request->id);
        event(new AddingHirerJob($request));
        return $request->id;
    }


    public function delete($id)
    {

        return $this->jobRequests->find($id)->delete();
    }


    public function getMaterialRequestData($id)
    {
        return $this->jobRequests->with(['materialRestData'])->find($id)->toArray();
    }


    public function updateMaterialRequestData($id, $data)
    {

        $current_data = $this->getMaterialRequestData($id);

        $expires_in = date('Y-m-d', strtotime($data['expiry_date']));

        $jobRequests_ob = $this->jobRequests->find($id);
        $jobRequests_ob->street_address = $data['street_address'];
        $jobRequests_ob->suburb = $data['suburb'];
        $jobRequests_ob->post_code = $data['post_code'];
        $jobRequests_ob->duration = $data['duration'];
        $jobRequests_ob->state_id = $data['state_id'];
        $jobRequests_ob->regions_id = $data['regions_id'];
        $jobRequests_ob->description = $data['description'];
        $jobRequests_ob->expiry_date = $expires_in;

        $jobRequests_ob->save();


        $rest_data = $this->materialRequestRestData->find($current_data['material_rest_data']['id']);
        $rest_data->resource_type = $data['resource_type'];
        $rest_data->quantity = $data['quantity'];
        $rest_data->condition = $data['condition'];

        $rest_data->save();

        return true;

    }
}