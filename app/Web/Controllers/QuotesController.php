<?php
namespace Web\Controllers;
use App\Models\Quotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Services\JobRequest\JobRequestService;
use Services\SupplierQuoatesService;
use Web\Requests\SupplierQuotesRequest;

use Web\Requests\SupplierQuotesSortRequest;
use Web\Requests\SupplierQuotesUpdateRequest;

class quotesController
{
    private $supplierQuoatesService;
    private $service;

    public function __construct(SupplierQuoatesService $supplierQuoatesService,JobRequestService $service)
    {
        $this->supplierQuoatesService = $supplierQuoatesService;
        $this->service = $service;
    }

    public function showSupplierQuotes(){
        $QuotesTableData =  $this->supplierQuoatesService->QuotesTable(tenant());
        return view('pages.supplier-portal-quates')->with(compact('QuotesTableData', 'message'));
    }

    public function supplierQuotes(SupplierQuotesRequest $request)
    {
        $this->supplierQuoatesService->addQuote($request->all());
        session()->flash('alert-success', 'Successfully Inserted!.');
        //return redirect()->back();
        return 'true';
    }

    public function showSupplierQuote($id){
        $QuotesTableData = $this->supplierQuoatesService->QuotesTableData($id);
       // return view('pages.show-supplier-quote')->with(compact('QuotesTableData'));
        return view('pages.view-supplier-quotes')->with(compact('QuotesTableData'));
    }

    public function showEditSupplierQuote($id){
        $Quotes = $this->supplierQuoatesService->QuotesTableData($id);
        return view('pages.edit-supplier-quotes')->with(compact('Quotes'));
    }

    public function editSupplierQuote(SupplierQuotesUpdateRequest $request){
        $input = Input::all();
        $this->supplierQuoatesService->editQuote($input);
        session()->flash('alert-success', 'Successfully Updated!.');
        $QuotesTableData =  $this->supplierQuoatesService->QuotesTable(tenant());
        //return view('pages.supplier-portal-quates')->with(compact('QuotesTableData'));
        return 'true';
    }

    public function searchSupplierQuotes()
    {
        $input = Input::all();
        $quotes = $this->supplierQuoatesService->filterQuotes($input);
        return view('pages.supplier-portal-quates')->with(compact('quotes'));
    }

    public function searchBySupplierQuotes(SupplierQuotesSortRequest $request){
        //$QuotesTableData =  $this->supplierQuoatesService->QuotesTable(tenant());

        $input = $request->all();
        $quotes =  $this->supplierQuoatesService->filterQuotes($input);

        return view('pages.supplier-portal-quates-serach')->with(compact('quotes','quotes'));
    }


}