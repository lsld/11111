<?php
namespace Web\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Services\Admin\QuotesService;

class QuoteController
{
    protected $service;

    public function __construct(QuotesService $service)
    {
        $this->service = $service;
    }

    public function lists()
    {
        $inputs = Input::all();
        $quotes = $this->service->viewList($inputs);


        return view('admin.quotes.list')
            ->with(compact('quotes'));
    }


    public function view($id)
    {
        $quotes = $this->service->viewQuote($id);
        return view('admin.quotes.view-quotes')
            ->with(compact('quotes'));
    }
}