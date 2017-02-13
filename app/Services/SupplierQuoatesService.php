<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 12/2/16
 * Time: 11:30 AM
 */
namespace Services;
use App\Constants\QuoteStatus;
use App\Constants\QuoteSavedState;
use Illuminate\Support\Facades\Input;
use App\Models\JobRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Quotes;
use Services\JobRequest\JobRequestService;

class SupplierQuoatesService
{
    private $quotes;
    private $jobRequestsService;

    public function __construct(Quotes $quotes, JobRequestService $jobRequestsService){
        $this->quotes = $quotes;
        $this->jobRequestsService = $jobRequestsService;
    }

    public function addQuote($data){
        $value = $this->lastQuoteValue();
        $prefix = "Q";
        $code =  $this->reference_generator($value, $prefix);
        return $this->addSupplierQuote($data, $code);
    }

    public function addSupplierQuote($data, $code){
        $price = $data['price'];
        $is_drafted = $data['is_drafted'];
        $expiry_date = $data['expiry_date'];
        $expiry_date  = date('Y-m-d', strtotime($expiry_date));
        $description = $data['description'];
        $status = QuoteStatus::PENDING;
        $job_request_id =  $data['job_request_id'];
        if(empty($description)){
            $description = "Not Available.";
        }
        return $this->quotes->create(
            [
                'tenant_id' => tenant(),
                'price' => $price,
                'expiry_date' => $expiry_date,
                'description' => $description,
                'status' => $status,
                'job_request_id' => $job_request_id,
                'is_drafted' => $is_drafted,
                'code' => $code
            ]
        );
    }

    public function lastQuoteValue(){
        $value = null;
        $quoteValue = $this->quotes->orderBy('id', 'desc')->first();
        if ($quoteValue){
            $value = substr($quoteValue->code, (strripos($quoteValue->code, '-') + 1));
        }
        return $value;
    }

    function reference_generator($value, $prefix){
        $prefix = $prefix. '-';
        if (empty($value)) {
            $value = 99999;
        }
        ++$value;
        return $prefix . $value;
    }

    public function QuotesTableData($id){
        $statuses = array_flip(constants(QuoteStatus::class, true));
        $savedStates = array_flip(constants(QuoteSavedState::class, true));
        $quotes = Quotes::where('id',$id)->with(['JobRequest'])->get();
        $quotes->map(function($item, $key) use($statuses, $savedStates){
            $item->status = $statuses[$item->status];
            $item->is_drafted = $savedStates[$item->is_drafted];
        });
        return $quotes;
    }


    public function quotesByJobRequest($id){
        $statuses = array_flip(constants(QuoteStatus::class, true));
        $savedStates = array_flip(constants(QuoteSavedState::class, true));
        $quotes = Quotes::where('job_request_id',$id)->with(['JobRequest'])->get();
        $quotes->map(function($item, $key) use($statuses, $savedStates){
            $item->status = $statuses[$item->status];
            $item->is_drafted = $savedStates[$item->is_drafted];
        });
        return $quotes;
    }

    public function QuotesTable($id){
        $statuses = array_flip(constants(QuoteStatus::class, true));
        //$quotes = Quotes::where('tenant_id',$id)->with(['JobRequest'])->get();
        $quotes = Quotes::where('tenant_id',$id)->with(['JobRequest'])->paginate(5);

        $quotes->map(function($item, $key) use($statuses){
            $item->status = $statuses[$item->status];
        });
        return $quotes;
    }

    public function editQuote($data){
        $id = $data['id'];
        $quotes = Quotes::find($id);
        $quotes->price = $data['price'];
        $quotes->expiry_date = date('Y-m-d', strtotime($data['expiry_date']));
        $quotes->description = $data['description'];
        $quotes->save();
    }

    public function filterQuotes($input){
        $statuses = array_flip(constants(QuoteStatus::class, true));
        $query = Quotes::where('tenant_id', tenant())->with(['JobRequest']);
        if(!empty(Input::has('status'))){
            $query = $query->where('status', $input['status']);
        }
        if(!empty(Input::has('submitted_at'))){
            $submitted_at  = date('Y-m-d', strtotime($input['submitted_at']));
            $query = $query->where('is_drafted', QuoteSavedState::SUBMITTED)
                ->whereDate('created_at', '=' , $submitted_at);
        }
        if(!empty(Input::has('created_at'))){
            $created_at  = date('Y-m-d', strtotime($input['created_at']));
            $query = $query->where('is_drafted', QuoteSavedState::DRAFTED)
                ->whereDate('created_at', '=' , $created_at);
        }
        if(!empty(Input::has('q_expiry_date'))){
            $q_expiry_date  = date('Y-m-d', strtotime($input['q_expiry_date']));
            $query->where('expiry_date', '=' , $q_expiry_date);
        }
        if(!empty(Input::has('searchKey'))){
            if (strpos($input['searchKey'], 'Q') !== false){
                $query = $query->where('code' , 'LIKE', '%'.$input['searchKey'].'%');
            }
            if (strpos($input['searchKey'], 'R') !== false){
                $query = $query->where('code' , 'LIKE', '%'.$input['searchKey'].'%');
            }
        }
        $result =  $query->get();

        $result->map(function($item, $key) use($statuses){
            $item->status = $statuses[$item->status];
        });
        return $result;
    }


    public function  checkJobRequest($id){
        $quotes = Quotes::where('job_request_id',$id)->with(['JobRequest'])->get();

        return $quotes;
    }

    public  function getQuoteById($id){
        return  $this->quotes->where('id', $id)->first();
    }

    public function changeStatus($quote_id, $status){
        $quotes =$this->quotes->find($quote_id);

        if($status == 1){
            $this->rejectStatus($quotes->job_request_id);
        }

        $quotes->status = $status;
        $quotes->save();

    }

    private function rejectStatus($job_request_id){
        $quotesOut = $this->quotes->where('job_request_id', $job_request_id)->get();

        foreach($quotesOut as $qu){
            $qu->status = 2;
            $qu->save();
        }
    }
}