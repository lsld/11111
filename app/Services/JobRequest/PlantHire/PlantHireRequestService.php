<?php
namespace Services\JobRequest\PlantHire;


use App\Constants\JobRequestStatus;
use App\Events\AddingHirerJob;
use App\Models\JobRequests;
use Services\JobRequest\JobRequestManageService;
use Services\Matching\MatchingService;


class PlantHireRequestService
{

    protected $jobRequests;
    protected $jobRequestManageService;
    protected $job_type_id = 1;
    protected $plantHireService;
    protected $matchingService;

    public function __construct(
        JobRequests $jobRequests,
        JobRequestManageService $jobRequestManageService,
        PlantHireService $plantHireService,
        MatchingService $matchingService
    ) {

        $this->jobRequests = $jobRequests;
        $this->jobRequestManageService = $jobRequestManageService;
        $this->plantHireService = $plantHireService;
        $this->matchingService = $matchingService;
    }

    public function generateSessionData($data = null)
    {

        if ($data) {
            $ss = array();
            if (isset($data['plant_hire'])) {
                foreach ($data['plant_hire'] as $plant_hire) {
                    foreach ($plant_hire['properties'] as $properties) {

                        switch ($properties['type']) {
                            case 'text':
                                $ss[$plant_hire['properties_id']][$properties['dynamic_property_id']] = $properties['text']['value'];
                                break;
                            case 'DD':
                                $ss[$plant_hire['properties_id']][$properties['dynamic_property_id']] = $properties['dropdown']['option_id'];
                                break;
                            case 'MS':
                                foreach ($properties['multi_select'] as $multi_select) {
                                    $ss[$plant_hire['properties_id']][$properties['dynamic_property_id']][] = $multi_select['option_id'];
                                }

                                break;
                            case 'RB':
                                $ss[$plant_hire['properties_id']][$properties['dynamic_property_id']] = $properties['text']['option_id'];
                                break;
                        }
                    }
                }
            }
            return $ss;
        }
        return null;
    }

    public function loadPlantHireRequest($id)
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
                                'radioButton'
                            ]);
                        }
                    ]);
                }
            ])->find($id)->toArray();

            if ($data) {
                return $data;
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }


    }

    public function addItem($request_id, $data)
    {

        return $this->jobRequestManageService->addItem($this->job_type_id, $request_id, $data);

    }

    public function storePlantHireData($entity_id, $entity_type, $user_id, $data, $session)
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

        $this->addItem($request->id, $session);
        $this->matchingService->sendNotificationsToSupplier($request->id);
        event(new AddingHirerJob($request));
        return $request->id;

    }

    public function delete($id)
    {

        $plant_hire_data = $this->loadPlantHireRequest($id);
        $this->jobRequestManageService->dropData($id, $plant_hire_data);
        $this->jobRequests->find($id)->delete();

        return true;
    }

    public function updateRequest($id, $data, $item_table)
    {

        $plant_hire_data = $this->loadPlantHireRequest($id);
        $properties = $this->plantHireService->getPropertyList();

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

        $this->jobRequestManageService->dropData($id, $plant_hire_data);
        $this->addItem($id, $item_table);

        return true;

    }


}