<?php
/**
 * Created by PhpStorm.
 * User: maduranga
 * Date: 2/6/17
 * Time: 3:17 PM
 */

namespace Services\Company;

use App\Models\CompanyLocation;
use App\Models\Company;

use Services\SupplierRegistrationService;

use App\Models\CompanyLocationRegion;


class CompanyLocationService
{
    protected $companyLocation;
    protected $company;
    protected $companyLocationRegion;
    protected $supplierRegistration;



    public function __construct(CompanyLocation $companyLocation,
                                Company $company,
                                CompanyLocationRegion $companyLocationRegion,
                                SupplierRegistrationService $supplierRegistration)
    {
        $this->companyLocation      = $companyLocation;
        $this->company              = $company;
        $this->companyLocationRegion = $companyLocationRegion;
        $this->supplierRegistration  =   $supplierRegistration;
    }

    public function getLocationData( $id){
        return $this->companyLocation->with([
                                            'states',
                                            'companyLocationRegion'=> function($r){
                                                                                    return $r->with('region');
                                                                                }
                                            ])->find($id);
    }

    public function updateCompanyLocation($tenant_id, $data, $id){

        $this->companyLocationRegion->where('company_location_id', $id)->delete();

        $location = $this->companyLocation->find($id);

        $location->name             = $data['name'];
        $location->email            = $data['email'];
        $location->phone            = $data['phone'];
        $location->street_address_1 = $data['street_address'];
        $location->membership_id    = $data['membership_id'];
        $location->suburb           = $data['suburb'];
        $location->post_code        = $data['post_code'];

        $location->save();

        $re = [];
        if(isset($data['region_id'])){
            foreach ($data['region_id'] as $region_id){
                $re[] = new CompanyLocationRegion(['region_id' => $region_id]);
            }
        }
        $location = $this->companyLocation->find($id);
        $location->companyLocationRegion()->saveMany($re);

        return;
    }

    public function deleteCompanyLocation($tenant_id, $id){

        $this->companyLocationRegion->where('company_location_id', $id)->delete();

        $location = $this->companyLocation->with('companyLocationRegion')->find($id)->delete();

        return;

    }

    public function locationList($tenant_id){

        $companyLocation = $this->company->where('tenant_id', $tenant_id)
                                        ->with([
                                            'locations' => function($q){
                                                return $q->orderBy('id', 'DESC')->with([
                                                    'states',
                                                    'companyLocationRegion' => function($r){
                                                        return $r->with('region');
                                                    }
                                                ]);
                                            }
                                        ])
                                        ->get();

        return $companyLocation[0];
    }
}