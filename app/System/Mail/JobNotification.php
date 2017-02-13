<?php

namespace System\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $job;
    protected $supplier;
    protected $hirer;
    protected $job_type;
    protected $property_label;

    public function __construct($mail_data)
    {
        $this->job              = $mail_data['job'];
        $this->supplier         = $mail_data['supplier'];
        $this->hirer            = $mail_data['hirer'];
        $this->job_type         = $mail_data['job_type'];
        $this->property_label   = $mail_data['property_label'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notification')
                    ->with([
                        'first_name'    =>  $this->supplier->first_name,
                        'hirer_name'    =>  $this->hirer->companies->name,
                        'Job_request_type'=> $this->job_type->name,
                        'job_url'       =>  route('view-job-request', $this->job->id),
                        'category_type' =>  $this->property_label
                    ]);
    }
}
