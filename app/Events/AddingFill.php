<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 12/5/16
 * Time: 1:36 PM
 */

namespace App\Events;

use App\Models\Fill;


class AddingFill
{
    public $fill;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Fill $fill)
    {
        $this->fill = $fill;
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