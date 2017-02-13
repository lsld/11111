<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 12/5/16
 * Time: 2:29 PM
 */

namespace App\Events;


use App\Models\Contracting;

class AddingContracting
{

    public $contracting;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Contracting $contracting)
    {
        $this->contracting = $contracting;
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