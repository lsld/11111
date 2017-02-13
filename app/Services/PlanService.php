<?php

namespace Services;


use App\Models\Plan;

class PlanService
{
    private $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }


    public function find($id)
    {
        return $this->plan->withRelated()->find($id);
    }

    public function save($data)
    {
        return $this->plan->save($data);
    }


    public function getSubscriptionPlan($planId)
    {
        $gst = (int)config('taxes.gst');
        $this->plan = $this->find($planId);
        $this->plan->start_date = date('Y-m-d');
        $this->plan->end_date = date("Y-m-d", strtotime(" +12 months"));
        $this->plan->period = '1 Year';
        $this->plan->gst = 0;
        $this->plan->discount = 0;
        $this->plan->discount_percentage = 0;
        $this->plan->sub_total = 0;
        $this->plan->total = 0;
        $this->plan->gst_percentage = $gst;
        if (!$this->plan->is_trial) {
            $this->plan->discount = value_format($this->plan->price_non_member - $this->plan->price_member);
            $this->plan->discount_percentage = value_format((($this->plan->price_non_member - $this->plan->price_member) /
                    $this->plan->price_non_member) * 100);
            $this->plan->sub_total = $this->plan->price_non_member;
            $this->plan->gst = ($this->plan->sub_total * ($gst / 100));
            $this->plan->total = value_format($this->plan->sub_total + $this->plan->gst);
            $this->plan->sub_total = value_format($this->plan->sub_total);
            $this->plan->gst = value_format($this->plan->gst);
        }
        return $this->plan;
    }
}