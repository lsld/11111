<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionInvoice extends Model
{
    protected $morphClass = 'SubscriptionInvoice';

    protected $fillable = ['reference_no', 'status', 'payment_gateway_id', 'amount', 'tenant_id', 'plan_id'];

    protected $hidden = [];

    /* Relations */

    public function paymentLogs()
    {
        return $this->morphMany(PaymentLog::class, 'entity');
    }

    /* End of  Relations */

    public function getMorphClass()
    {
        return $this->morphClass;
    }
}