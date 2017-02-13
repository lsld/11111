<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    public $table = "quotes";

    protected $fillable = ['code', 'description', 'price', 'expiry_date', 'status', 'job_request_id', 'tenant_id','is_drafted'];


    public function jobRequest()
    {
        return $this->belongsTo(JobRequests::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'tenant_id');
    }
}
