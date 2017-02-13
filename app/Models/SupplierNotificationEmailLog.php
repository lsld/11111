<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierNotificationEmailLog extends Model
{

    public $table = "supplier_notification_email_logs";

    public $timestamps = false;

    protected $fillable = ['tenant_id', 'user_id', 'Job_id', 'update_time'];

}
