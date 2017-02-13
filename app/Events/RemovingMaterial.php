<?php

namespace App\Events;

use App\Models\Material;

class RemovingMaterial
{
    public $material;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Material $material)
    {
        $this->material = $material;
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