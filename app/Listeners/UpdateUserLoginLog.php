<?php

namespace App\Listeners;

use App\Events\AuthLoginLog;
use App\Models\UserLoginLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class UpdateUserLoginLog
{

    public $user_login_log;

    public function __construct(UserLoginLog $user_login_log)
    {
        $this->user_login_log = $user_login_log;
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle($event)
    {
        $this->user_login_log->create([
            'user_id'   =>  $event->user->id,
        ]);
    }
}
