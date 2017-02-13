<?php
namespace Services\Admin;
use App\Models\Quotes;
use App\Constants\QuoteStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class QuotesService
{
    protected $quotes;

    public function __construct(Quotes $quotes)
    {
        $this->quotes = $quotes;
    }

    public function viewList($input)
    {
        $admin_states_list = Auth::User()->admin_states_list;

        if(Input::has('r_expiry_date'))
        {
            $r_expiry_date= date('Y-m-d', strtotime($input['r_expiry_date']));

            $data = $this->quotes->with(['JobRequest', 'company'])
                ->whereHas('JobRequest', function ($data) use($r_expiry_date) {

                    $data->where('expiry_date','=', $r_expiry_date);
                });
        }
        else{
            $data = $this->quotes->with(['JobRequest', 'company']);
        }



        $quote_id_list = array();

        if($admin_states_list){
            foreach($data->get() as $quote){
                if(in_array($quote->JobRequest->state_id , $admin_states_list)) {

                    $quote_id_list[] = $quote->id;
                }
            }

            $data = $data->whereIn('id', $quote_id_list);
        }


        if(Input::has('submitted_date'))
        {
            $submitted_date = date('Y-m-d H:i:s', strtotime($input['submitted_date']));
            $data->whereDate('created_at',  $submitted_date);
        }

        if(Input::has('q_expiry_date'))
        {
            $q_expiry_date = date('Y-m-d H:i:s', strtotime($input['q_expiry_date']));
            $data->where('expiry_date', $q_expiry_date);
        }



        if(Input::has('created_date'))
        {
            $created_date = date('Y-m-d H:i:s', strtotime($input['created_date']));
            $data->whereDate('created_at',  $created_date);
        }

        if(Input::has('status'))
        {
            $data->where('status', $input['status']);
        }

        if(Input::has('company_name'))
        {
            $data->where('status', $input['status']);
        }

        $statuses = array_flip(constants(QuoteStatus::class, true));


        $data = $data->get();

        $data->map(function($item) use($statuses){
            $item->status = $statuses[$item->status];
        });
        
        return $data;
    }


    public function viewQuote($id)
    {
        $statuses = array_flip(constants(QuoteStatus::class, true));

        $data = $this->quotes->where('id',$id)->with(['JobRequest'])->get();

        $data->map(function($item) use($statuses){
            $item->status = $statuses[$item->status];
        });

        return $data;
    }
}