<?php

namespace System\Events;

use App\Models\Tenant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class HirerHasRegistered
{
    use InteractsWithSockets, SerializesModels;

    protected $tenant;

    /**
     * Create a new event instance.
     *
     * @param Tenant $tenant
     */
    public function __construct(Tenant $tenant)
    {

        $this->tenant = $tenant;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
