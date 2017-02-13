<?php

namespace Services;

use App\Models\Subscription\SubscriptionInvoice;

class SubscriptionInvoiceService
{
    private $invoice;
    private $paymentGateway;
    private $paymentLogService;

    public function __construct(
        SubscriptionInvoice $invoice,
        PaymentGatewayService $paymentGateway,
        PaymentLogService $paymentLogService
    ) {
        $this->invoice = $invoice;
        $this->paymentGateway = $paymentGateway;
        $this->paymentLogService = $paymentLogService;
    }

    public function create($data)
    {
        return $this->invoice->create($data);
    }

    public function lastInvoiceValue()
    {
        $value = null;
        $invoice = $this->invoice->orderBy('id', 'desc')->first();

        if ($invoice) {
            $value = substr($invoice->reference_no, (strripos($invoice->reference_no, '-') + 1));
        }
        return $value;
    }

    public function updateInvoiceWithLog($data, $status)
    {
        $invoice = $this->invoice->find($data['invoice']);
        $invoice->status = true;
        $invoice->save();

        $this->paymentLogService->create([
            'entity_id' => $invoice->id,
            'entity_type' => $invoice->getMorphClass(),
            'status' => $status,
            'attributes' => collect($data)->toJson(),
            'payment_gateway_id' => $this->paymentGateway->getIdBySlug($data['gateway']),
        ]);

        return $invoice;
    }
}