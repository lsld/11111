<?php

namespace Services\JobRequest\Constructor;

use App\Constants\JobRequestStatus;
use App\Events\AddingHirerJob;
use App\Models\JobRequests;
use Services\JobRequest\JobRequestManageService;
use Services\Matching\MatchingService;

class ConstructorRequestService
{

    protected $jobRequests;
    protected $jobRequestManageService;
    protected $job_type_id = 2;

    public function __construct(
        JobRequests $jobRequests,
        JobRequestManageService $jobRequestManageService,
        MatchingService $matchingService
    ) {

        $this->jobRequests = $jobRequests;
        $this->jobRequestManageService = $jobRequestManageService;
        $this->matchingService = $matchingService;
    }

    public function addItem($request_id, $data)
    {

        return $this->jobRequestManageService->addItem($this->job_type_id, $request_id, $data);

    }

    public function storeConstructorRequestData($entity_id, $entity_type, $user_id, $data)
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

        $session = array();
        if (isset($data['properties_id'])) {
            foreach ($data['d_property'] as $key => $dd_data) {
                $session[$data['properties_id']][$key] = $dd_data;
            }
        }
        $this->addItem($request->id, $session);

        $this->matchingService->sendNotificationsToSupplier($request->id);
        event(new AddingHirerJob($request));
        return $request->id;
    }

    public function updateRequest($id, $data)
    {

        $service_data = $this->loadServiceRequest($id);

        $expires_in = date('Y-m-d', strtotime($data['expiry_date']));

        $ph_r_id = $this->jobRequests->find($id);
        $ph_r_id->street_address = $data['street_address'];
        $ph_r_id->suburb = $data['suburb'];
        $ph_r_id->post_code = $data['post_code'];
        $ph_r_id->duration = $data['duration'];
        $ph_r_id->state_id = $data['state_id'];
        $ph_r_id->regions_id = $data['regions_id'];
        $ph_r_id->description = $data['description'];
        $ph_r_id->expiry_date = $expires_in;

        $ph_r_id->save();

        $this->jobRequestManageService->dropData($id, $service_data);

        $session = array();
        if (isset($data['properties_id'])) {
            foreach ($data['d_property'] as $key => $dd_data) {
                $session[$data['properties_id']][$key] = $dd_data;
            }
        }
        $this->addItem($id, $session);

        return true;

    }


    public function loadServiceRequest($id)
    {

        try {
            $data = JobRequests::with([
                'plantHire' => function ($q) {
                    return $q->with([
                        'properties' => function ($r) {
                            return $r->with([
                                'text',
                                'dropdown',
                                'multiSelect',
                                'radioButton',
                                'checkBox'
                            ]);
                        }
                    ]);
                }
            ])->find($id)->toArray();

            if ($data) {
                return $data;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }


    }

    public function createSessionData($service_data)
    {

        if ($service_data) {

            $tem = array();
            foreach ($service_data as $key => $data) {

                foreach ($data['properties'] as $properties) {
                    if ($properties) {

                        switch ($properties['type']) {
                            case 'text':
                                $tem[$data['properties_id']][$properties['dynamic_property_id']] = $properties['text']['value'];
                                break;
                            case 'DD':
                                $tem[$data['properties_id']][$properties['dynamic_property_id']] = $properties['dropdown']['option_id'];
                                break;
                            case 'MS':
                                foreach ($properties['multi_select'] as $multi_select) {
                                    $tem[$data['properties_id']][$properties['dynamic_property_id']][] = $multi_select['option_id'];
                                }
                                break;
                            case 'RB':
                                $tem[$data['properties_id']][$properties['dynamic_property_id']] = $properties['radio_button']['option_id'];
                                break;
                            case 'CB':
                                $tem[$data['properties_id']][$properties['dynamic_property_id']] = $properties['check_box']['checked'];
                                break;
                        }

                    }
                }
            }
            return $tem;
        }
        return null;
    }

    public function delete($id)
    {

        $plant_hire_data = $this->loadServiceRequest($id);
        $this->jobRequestManageService->dropData($id, $plant_hire_data);
        $this->jobRequests->find($id)->delete();

        return true;
    }

}