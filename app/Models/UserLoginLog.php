<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model
{

    public $table = "user_login_logs";

    public $timestamps = false;

    protected $fillable = ['user_id', 'log_time'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->log_time = $model->freshTimestamp();
        });
    }
}
