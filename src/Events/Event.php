<?php

namespace Viauco\Realtime\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;

abstract class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //public $broadcastQueue = 'conversations';
    public function __construct()
    {

    }

    public function broadcastOn()
    {
        return new Channel( 'conversations' );
    }

    public function broadcastAs()
    {
        return 'conversations';
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        return isset( $this->{$name} ) ? $this->{$name} : null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        return isset($this->{$name});
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        unset($this->{$name});
    }
}
