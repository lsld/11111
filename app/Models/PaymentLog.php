<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $fillable = ['entity_id', 'entity_type', 'status', 'attributes', 'payment_gateway_id'];

    protected $hidden = ['created_at', 'updated_at'];
}