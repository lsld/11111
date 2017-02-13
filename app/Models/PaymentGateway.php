<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = ['name', 'slug'];
    
    protected $hidden = ['created_at', 'updated_at'];
}