<?php

namespace App\Events;

use App\Models\PlantHire;

class RemovingMachines
{
    public $machines;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PlantHire $machines)
    {
        $this->machines = $machines;
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