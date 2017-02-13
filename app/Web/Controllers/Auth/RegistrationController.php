<?php

namespace Web\Controllers\Auth;

use App\Models\Region;
use App\Models\JobTypes;
use App\Models\CompanyLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Services\Company\CompanyService;
use Services\HirerRegistrationService;
use Services\PaymentGatewayService;
use Services\PlanService;
use Services\SubscriptionInvoiceService;
use Services\SupplierContractService;
use Services\SupplierFillService;
use Services\SupplierMaterialService;
use Services\SupplierPlantService;
use Services\SupplierRegistrationService;
use Services\TenantService;
use Services\Company\CompanyLocationService;
use Services\SupplierNotificationService;
use Services\SupplierServicesService;

use System\Payment\Constants\IPGS;
use System\Payment\Facades\Payment;
use Web\Controllers\Controller;
use Web\Requests\HirerSingUpRequest;
use Web\Requests\SupplierServiceContractRequest;
use Web\Requests\SupplierServiceFillRequest;
use Web\Requests\SupplierServiceMaterialRequest;
use Web\Requests\SupplierServicePlantRequest;
use Web\Requests\SupplierSignupPackageRequest;
use Web\Requests\SupplierSignUpReview;
use Web\Requests\SupplierSingUpAccountRequest;
use Web\Requests\SupplierSingUpLocationRequest;
use Web\Requests\SupplierSingUpProfileRequest;


class RegistrationController extends Controller
{
    /**
     * @var HirerRegistrationService
     */
    private $hirerRegistration;
    /**
     * @var SupplierRegistrationService
     */
    private $supplierRegistration;

    private $supplierPlantService;

    private $supplierContractService;

    private $supplierMaterialService;

    private $supplierFillService;


    private $companyLocationService;

    private $jobTypes;

    private $notificationService;

    private $servicesService;

    public function __construct(
        HirerRegistrationService $hirerRegistration,
        SupplierRegistrationService $supplierRegistration,
        CompanyService $companyService,
        //@TODO - Lakitha use factory DP
        SupplierPlantService $supplierPlantService,
        SupplierContractService $supplierContractService,
        SupplierMaterialService $supplierMaterialService,
        SupplierFillService $supplierFillService,

        CompanyLocationService $companyLocationService,
        JobTypes $jobTypes,
        SupplierNotificationService $notificationService,
        SupplierServicesService $servicesService
    ) {
        $this->hirerRegistration = $hirerRegistration;
        $this->supplierRegistration = $supplierRegistration;
        $this->supplierPlantService = $supplierPlantService;
        $this->supplierContractService = $supplierContractService;
        $this->supplierMaterialService = $supplierMaterialService;
        $this->supplierFillService = $supplierFillService;
        $this->companyLocationService = $companyLocationService;
        $this->jobTypes = $jobTypes;
        $this->notificationService = $notificationService;
        $this->servicesService = $servicesService;
    }

    public function showHirerSingUpForm()
    {
        return view('signup.hirer-register');
    }

    public function hirerSingUp(HirerSingUpRequest $request)
    {
        $isRegistered = $this->hirerRegistration->register($request->all());

        if ($isRegistered) {
            $request->session()->flash('alert-success', 'You\'ve successfully registered ');
        } else {
            $request->session()->flash('alert-danger', 'Some error has occurred please contact admin.');
        }

        return redirect("login");
    }


    public function showSubscription()
    {
        //@TODO- Lakith move wrap with private method
        $registrationData =
            [
                'show_supplier_singup_subscription' => 'null',
                'show_supplier_singup' => 'null',
                'show_supplier_singup_company_profile' => 'null',
                'show_supplier_singup_location' => 'null',
                'show_supplier_services' => 'null',
                'show_supplier_notifications' => 'null',
                'show_supplier_singup_submit' => 'null',
            ];
        //@TODO- Lakith move wrap with private method
        $progessPoints = [
            'step1' => 'null',
            'step2' => 'null',
            'step3' => 'null',
            'step4' => 'null',
            'step5' => 'null',
            'step6' => 'null',
            'step7' => 'null',
        ];

        Session(
            ['registrationData' => $registrationData]
        );

        Session(
            ['progessPoints' => $progessPoints]
        );

        //@TODO - move to a method
        Session::put('progessPoints.step1', 'signup-point-1');

        return view('signup.supplier-subscription');
    }

    public function subscription( SupplierSignupPackageRequest $request ) {

        Session::put('registrationData.show_supplier_singup_subscription', 'added');
        Session()->forget('progessPoints.step1');
        Session::put('progessPoints.step2', 'signup-point-2');
        Session::put('subscription_package_id', $request->get('package'));

        $this->setUpWizardData(['subscription' => $request->get('package')], "show_supplier_singup");
        return redirect()->route('show_supplier_services');
    }

    public function showSupplierAccount() {
        return view('signup.supplier-register');
    }

    public function supplierAccount(SupplierSingUpAccountRequest $request,
                                    PlanService $planService,
                                    TenantService $tenantService)  {
        $details = $this->supplierRegistration->account($request->all());

        /* Start subscription details */
        $tenantId = $details['tenant']->id;
        $plan = $planService->getSubscriptionPlan(Session::get('subscription_package_id'));
        $tenantService->createSubscription($tenantId, $plan);
        /* End subscriptions */

        Session::put('registrationData.show_supplier_singup', 'added');
        Session()->forget('progessPoints.step2');
        Session::put('progessPoints.step3', 'signup-point-3');

        $this->setUpWizardData(['tenant_id' => $details['tenant']->id]);

        $this->setUpWizardData(['company_id' => $details['company']->id ], "show_supplier_singup_company_profile");

        return redirect()->route('show_supplier_singup_company_profile');
    }



    public function showSupplierCompanyProfile(CompanyService $companyService)
    {
        //@TODO- Lakitha move this to view composer
        $operationCategories = $companyService->operationCategories();

        return view('signup.supplier-company-profile')
            ->with(compact('operationCategories'));
    }

    public function supplierCompanyProfile(SupplierSingUpProfileRequest $request)
    {


        $profile = $this->supplierRegistration->companyProfile(
            $request->all(),
            $this->getWizardData('company_id'));

        $this->supplierRegistration->setFlagStatus($this->getWizardData('tenant_id'), 'profile_inserted');

        /* for the progess bar */

        Session::put('registrationData.show_supplier_singup_company_profile', 'added');
        Session()->forget('progessPoints.step3');
        Session::put('progessPoints.step4', 'signup-point-4');

        $this->setUpWizardData(['profile_id' => $profile->id], "show_supplier_singup_location");

        return redirect()->route('show_supplier_singup_location');
    }

    public function supplierCompanyProfileSkip(){

        $profile = $this->supplierRegistration->companyProfile(
            null,
            $this->getWizardData('company_id'));

        Session::put('registrationData.show_supplier_singup_company_profile', 'skipped');
        Session()->forget('progessPoints.step3');
        Session::put('progessPoints.step4', 'signup-point-4');

        $this->setUpWizardData(['profile_id' => $profile->id ], "show_supplier_singup_location");

        return redirect()->route('show_supplier_singup_location');
    }

    public function showSupplierLocations()
    { //dd(Session::all());
        //@TODO - Lakitha move to  a method DRY
        $locations = $this->supplierRegistration->locationsOfSupplier($this->getWizardData('company_id'));
        $checkLocation = 1;

        if (empty($locations)) {
            $checkLocation = 0;
        }

        return view('signup.supplier-location')
            ->with(compact('locations', 'checkLocation'));
    }

    public function supplierLocations(SupplierSingUpLocationRequest $request)
    {

        $locations = $this->supplierRegistration->locationsOfSupplier($this->getWizardData('company_id'));

        if (empty($locations)) {
            $checkLocation = 0;
        } else {
            $checkLocation = 1;
        }

        $this->supplierRegistration->addLocation(
            $request->all(),
            $this->getWizardData('company_id')
        );
        $this->setUpWizardData(['locations' => "added"], "show_supplier_singup_location");

        return redirect()->back()->with(compact('checkLocation'));
    }

    public function supplierLocationsComplete()
    {
        if ($this->getWizardData('locations') != "added") {
            return redirect()->back()->withErrors(['locations' => 'needed']);
        }

        $this->supplierRegistration->setFlagStatus($this->getWizardData('tenant_id'), 'locationsInserted');

        /* for the pogess bar */
        //session()->forget('supplier_company_profile');
        //$this->setUpWizardData(['supplier_locations' => 'added']);
        Session::put('registrationData.show_supplier_singup_location', 'added');
        Session()->forget('progessPoints.step4');
        Session::put('progessPoints.step5', 'signup-point-5');

        $this->setUpWizardData(['subscription' => "added"], 'show_supplier_services');

        return redirect()->route('show_supplier_singup_subscription');
    }

    public function locationsSkip()
    {$this->setUpWizardData(['show_supplier_singup_location' => 'skip'], "show_supplier_services");


        Session()->forget('progessPoints.step4');
        Session::put('progessPoints.step5', 'signup-point-5');
        Session::put('registrationData.show_supplier_singup_location', 'skipped');

        return redirect()->route('show_supplier_singup_subscription');
    }

    public function showService()
    {
        $tenantId = $this->getWizardData('tenant_id');


        $itemTypes = $this->supplierPlantService->itemTypes();


        $hireTypes = $this->supplierPlantService->hireTypes();

        //$accessories = $this->supplierPlantService->accessories();

        //@TODO - Lakitha rename this "plantHireTableData"
        $plantHireTableData = $this->supplierPlantService->plantHireTableData($tenantId);

        //$jobTypes = $this->supplierContractService->jobTypes();


        $workTypes = $this->supplierContractService->workTypes();

        //@TODO - Lakitha rename this
        $contractingTableData = $this->supplierContractService->contractingTableData($tenantId);
        //dd($contractingTableData);

        $resourceTypes = $this->supplierMaterialService->resourceTypes();

        //@TODO - Lakitha rename this
        $materialTableData = $this->supplierMaterialService->materialTableData($tenantId);


        $fillTypes = $this->supplierFillService->fillType();

        //@TODO - Lakitha rename this
        $fillTableData = $this->supplierFillService->fillTableData($tenantId);

        $availableDataIdList = [
            'plantHire'     =>  $plantHireTableData->pluck('item_category_id')->toArray(),
            'contracting'   =>  $contractingTableData->pluck('work_type_id')->toArray(),
            'material'      =>  $materialTableData->pluck('resource_type_id')->toArray(),
            'fill'          =>  $fillTableData->pluck('fill_type_id')->toArray(),
        ];



        if (empty($contractingTableData) && empty($materialTableData) && empty($fillTableData) && empty($plantHireTableData)) {

            Session::put('checkSupplierService', 1);
        } else {
            Session::put('checkSupplierService', 0);
        }

        return view('signup.supplier-services')->with(compact('itemTypes', 'hireTypes',
            'plantHireTableData', 'tenantId', 'jobTypes', 'jobTypes', 'workTypes', 'contractingTableData',
            'resourceTypes', 'materialTableData', 'fillTypes', 'fillTableData', 'checkService','availableDataIdList'));
    }

    public function plantService(SupplierServicePlantRequest $request)
    {
        //@TODO - Lakitha rename this $val & follow DRY
        $val = $this->supplierRegistration->addService($request->all());

        if ($val == false) {
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_supplier_services');
            return 'true';
        }

        $this->setUpWizardData(['Service' => "added"], "show_supplier_services");

        Session::put('checkSupplierService', 0);

        $success_msg = 'Successfully added.';
        session()->flash('alert-success', $success_msg);

        return 'true';
        //return redirect()->route('show_supplier_services');
    }

    public function contractingService(SupplierServiceContractRequest $request)
    {
        //@TODO - Lakitha rename this $val
        $val = $this->supplierRegistration->addService($request->all());

        if ($val == false) {
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_supplier_services');
            return 'true';
        }

        $this->setUpWizardData(['Service' => "added"], "show_supplier_services");

        Session::put('checkSupplierService', 0);

        session()->flash('alert-success', 'Successfully added.');
        //return redirect()->route('show_supplier_services');
        return 'true';
    }

    public function materialService(SupplierServiceMaterialRequest $request)
    {
//        $tenantId = $this->getWizardData('tenant_id');
        $val = $this->supplierRegistration->addService($request->all());

        if ($val == false) {
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_supplier_services');
            return 'true';
        }

        $this->setUpWizardData(['Service' => "added"], "show_supplier_services");

        //return redirect()->back();
        session()->flash('alert-success', 'Successfully added.');
        //return redirect()->route('show_supplier_services');
        return 'true';
    }

    public function fillService(SupplierServiceFillRequest $request)
    {
        $val = $this->supplierRegistration->addService($request->all());

        if ($val == false) {
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_supplier_services');
            return 'true';
        }

        $this->setUpWizardData(['Service' => "added"], "show_supplier_services");


        session()->flash('alert-success', 'Successfully added.');
        //return redirect()->route('show_supplier_services');
        return 'true';
    }

    public function supplierServiceComplete()
    {
        $tenantId = $this->getWizardData('tenant_id');
        $errors = 0;
        $plantHireTableData = $this->supplierPlantService->plantHireTableData($tenantId)->toarray();
        $contractingTableData = $this->supplierContractService->contractingTableData($tenantId)->toarray();
        $materialTableData = $this->supplierMaterialService->materialTableData($tenantId)->toarray();
        $fillTableData = $this->supplierFillService->fillTableData($tenantId)->toarray();

        if (empty($contractingTableData) && empty($materialTableData) && empty($fillTableData) && empty($plantHireTableData)) {
            return redirect()->back()->withErrors(['Service' => 'needed']);
        }

        $this->supplierRegistration->setFlagStatus($tenantId, 'servicesInserted');

        /* for the progress bar */
        //session()->forget('supplier_subscription');
        //$this->setUpWizardData(['supplier_services' => 'added']);
        Session::put('registrationData.show_supplier_services', 'added');
        Session()->forget('progessPoints.step5');
        Session::put('progessPoints.step6', 'signup-point-6');

        $this->setUpWizardData(['Service' => 'added'], "show_supplier_notifications");
        return redirect()->route('show_supplier_notifications');

    }

    public function servicesSkip()
    {

        Session()->forget('progessPoints.step5');
        Session::put('progessPoints.step6', 'signup-point-6');
        Session::put('registrationData.show_supplier_services', 'skipped');


        //$this->setUpWizardData(['supplier_services' => 'skipped'], "show_supplier_notifications");
        return redirect()->route('show_supplier_notifications');
    }


    public function showNotifications()
    {
        $tenantId = $this->getWizardData('tenant_id');
        $services = Session::get('registrationData.show_supplier_services');
        $locations = Session::get('registrationData.show_supplier_singup_location');

        $errors = 0;

        if ($services == "skipped" || $locations == "skipped") {
            $errors = 1;
            return view('signup.supplier-notification')->with(compact('errors'));
        } else {
            $supplier_id = $tenantId;
            $location_list = $this->companyLocationService->locationList($tenantId);
            $service_list  = $this->servicesService->getSupplierServiceList($tenantId);
            $notifications = $this->notificationService->getNotificationSettings($tenantId);
            $job_types     =  $this->jobTypes->all();

            return view('signup.supplier-notification')
                ->with(compact('job_types', 'notifications', 'service_list', 'location_list', 'supplier_id', 'errors' ));
        }
    }


    public function supplierNotifications(Request $request)
    {
        $tenantId = $this->getWizardData('tenant_id');

        if(isset($request['setting'])){
            $this->notificationService->updateSupplierNotifications($tenantId, $request['setting']);
        }

        $this->supplierRegistration->setFlagStatus($tenantId, 'notifications_inserted');

        Session()->forget('progessPoints.step6');
        Session::put('progessPoints.step7', 'signup-point-7');

        Session::put('registrationData.show_supplier_notifications', 'added');

        $this->setUpWizardData(['notifications' => 'added'], "show_supplier_singup_submit");
        return redirect()->route('show_supplier_singup_submit');
    }

    public function notificationsSkip()
    {
        //notification skip
        Session()->forget('progessPoints.step6');
        Session::put('progessPoints.step7', 'signup-point-7');

        Session::put('registrationData.show_supplier_notifications', 'skipped');

        $this->setUpWizardData(['notifications' => 'added'], "show_supplier_singup_submit");
        return redirect()->route('show_supplier_singup_submit');
    }

    public function showReviewAndSubmit(PlanService $planService)
    {

        //TODO if multiple payment gateways are implemented must pick the gateway from this form
        $plan = $planService->getSubscriptionPlan($this->getWizardData('subscription_package_id'));
        // Session::put('signup.supplier-pay', 'added');
        return view('signup.supplier-pay', compact('plan'));
    }

    public function reviewAndSubmit(
        SupplierSignUpReview $request,
        PaymentGatewayService $paymentGatewayService,
        PlanService $planService,
        SubscriptionInvoiceService $invoiceService
    ) {


        //$plan = $planService->getSubscriptionPlan($this->getWizardData('subscription'));

        $plan = $planService->getSubscriptionPlan($this->getWizardData('subscription_package_id'));

        $tenantId = $this->getWizardData('tenant_id');
        $ref = unique_invoice_id($invoiceService->lastInvoiceValue());



        /* for the progress bar */
        Session::put('registrationData.supplier_pay', 'added');
        Session()->forget('progessPoints.step6');
        Session::put('progessPoints.step7', 'signup-point-7');




        if (!$plan->is_trial) {


            $invoice = $invoiceService->create([
                'reference_no' => $ref,
                'status' => false,
                'payment_gateway_id' => $paymentGatewayService->getIdBySlug(IPGS::COMMON_WEB),
                //This must be taken dynamically
                'amount' => value_cleanse($plan->total),
                'tenant_id' => $tenantId,
                'plan_id' => $plan->id
            ]);



            $returnUrl = route(
                'payment_verify',
                [
                    'gateway' => IPGS::COMMON_WEB,
                    'invoice' => uid($invoice->id),
                    'action' => 'subscription',
                    'plan' => uid($plan->id),
                    'tenant' => uid($tenantId)
                ]);
            $description = title_case($plan->subscriptionCategory->name);
            $subscriptionData = [
                'amount' => $plan->total,
                'ref_id' => $ref,
                'description' => $description,
            ];
            //TODO get the payment gateway slug from table , provide a list to front then have to return the slug
            $gatewayLink = Payment::ipg(IPGS::COMMON_WEB, $returnUrl)
                ->subscriptionButton($subscriptionData, $description);
            return redirect()->away($gatewayLink);
        } else {
            //If the plan is trial sending the activation link
            $request->session()->flash('alert-success', 'You\'ve successfully registered');
            $this->supplierRegistration->sendActivationLink($tenantId);
        }
        return redirect()->route('login');
    }

    public function paymentVerify(
        Request $request,
        SubscriptionInvoiceService $subscriptionInvoiceService,
        TenantService $tenantService,
        PlanService $planService
    ) {
        $data = $request->all();
        $payment = Payment::ipg($data['gateway'])->confirmPayment($data);
        $gatewayLink = null;
        $invoice = $subscriptionInvoiceService->updateInvoiceWithLog($data, $payment['status']);
        $tenantService->updateStatus($data['tenant'], $payment['status']);

        if (!$payment['status']) {
            $attempts = 1;
            $plan = $planService->getSubscriptionPlan($data['plan']);
            if (isset($data['retry'])) {
                $attempts = ++$data['retry'];
            }
            $returnUrl = route(
                'payment_verify',
                [
                    'gateway' => $data['gateway'],
                    'invoice' => uid($invoice->id),
                    'action' => 'subscription',
                    'plan' => uid($plan->id),
                    'tenant' => uid($data['tenant']),
                    'retry' => $attempts
                ]);
            $description = title_case($plan->subscriptionCategory->name);
            $subscriptionData = [
                'amount' => $plan->total,
                'ref_id' => $invoice->reference_no,
                'description' => $description,
            ];
            //TODO get the payment gateway slug from table , provide a list to front then have to return the slug
            $gatewayLink = Payment::ipg(IPGS::COMMON_WEB, $returnUrl)
                ->subscriptionButton($subscriptionData, $description);
            session(['gateway_link' => $gatewayLink]);
        } else {
            $this->supplierRegistration->sendActivationLink($data['tenant']);
        }
        return redirect()->route('payment_confirm', compact('payment'));
    }


    public function paymentConfirm(Request $request)
    {
        $payment = $request['payment'];
        $gatewayLink = session('gateway_link');
        session()->flush();
        return view('signup.payment-successfull', compact('payment', 'gatewayLink'));
    }

    /**
     * Set up data along with wizard
     * @param $data
     * @param $currentRoute
     */
    private function setUpWizardData($data, $currentRoute = null)
    {
        session([key($data) => $data[key($data)]]);

        session([
            'sign_up_wizard' => [
                'current_route' => $currentRoute,
            ]
        ]);
    }

    /**
     * get data along with wizard
     * @param $key
     */
    private function getWizardData($key)
    {
        return session($key);
    }

    public function getRegionsByStateId($id)
    {
        $regions = Region::where('states_id',$id)->get();
        $str = "";

        if($regions)
        {
            foreach($regions as $region)
            {
                $str .= '<option class="region_list_options region_list_option_state_.$region->states_id." value="'.$region->id.'" >' .$region->name. '</option>';

            }
        }
        else
        {
            $str .= '<option class="." >"."</option>';
        }

        return $str;
    }
}

