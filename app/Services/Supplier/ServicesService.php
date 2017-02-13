<?php
/**
 * Created by PhpStorm.
 * User: maduranga
 * Date: 2/8/17
 * Time: 1:14 AM
 */

namespace Services\Supplier;


use App\Models\Contracting;
use App\Models\Fill;
use App\Models\Material;
use App\Models\PlantHire;

class ServicesService
{

    protected $plantHire;
    protected $fill;
    protected $material;
    protected $contracting;

    public function __construct(PlantHire   $plantHire,
                                Contracting $contracting,
                                Material    $material,
                                Fill        $fill)
    {
        $this->plantHire = $plantHire;
        $this->fill      = $fill;
        $this->material  = $material;
        $this->contracting = $contracting;
    }

    public function getSupplierServiceList($tenant_id){

        $data = [];

        $data[1] =  $this->plantHire->orderBy('id', 'DESC')
                                    ->where('tenant_id', $tenant_id)
                                    ->with(['mainCategory'])
                                    ->get();

        $data[2] = $this->contracting->orderBy('id', 'DESC')
                                    ->where('tenant_id', $tenant_id)
                                    ->with(['mainCategory'])
                                    ->get();

        $data[3] = $this->material->orderBy('id', 'DESC')
                                    ->where('tenant_id', $tenant_id)
                                    ->with(['mainCategory'])
                                    ->get();

        
        $data[4] = $this->fill->orderBy('id', 'DESC')
                                ->where('tenant_id', $tenant_id)
                                ->with(['mainCategory'])
                                ->get();


        return $data;
    }
}