<?php

namespace Services;

use App\Models\PaymentLog;

class PaymentLogService
{
    private $paymentLog;

    public function __construct(PaymentLog $paymentLog)
    {
        $this->paymentLog = $paymentLog;
    }

    public function create($data)
    {
        return $this->paymentLog->create($data);
    }
}