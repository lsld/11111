<?php

namespace App\Events;

use App\Models\User;

class AuthLoginLog
{

    public $user;
    public $log_time;

    public function __construct( $user, $log_time)
    {
        $this->user = $user;
        $this->log_time = $log_time;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}