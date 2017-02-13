<?php

namespace Services;

use App\Models\PaymentGateway;

class PaymentGatewayService
{
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        return $this->paymentGateway->get()->order('name', 'asc');
    }

    public function getIdBySlug($slug)
    {
        $paymentGateway = $this->paymentGateway->where('slug', $slug)->first();
        if (!empty($paymentGateway)) {
            return $paymentGateway->id;
        }
        return null;
    }
}