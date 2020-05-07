<?php
namespace Viauco\Realtime\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class Notification extends BroadcastNow
{
    const _PUBLIC = 1;
    const _PRESENCE = 2;
    const _PRIVATE = 3;

    public $data;

    public $channel;

    public $mode;

    public function __construct($data, $channel, $mode = self::_PUBLIC)
    {
        $this->data         = $data;
        $this->channel      = 'notification-' . $channel;
        $this->mode         = $mode;
    }

    public function broadcastOn()
    {
        
        if( $this->mode == self::_PRESENCE ) {
            $push = new PresenceChannel( $this->channel );
        }
        else if( $this->mode == self::_PRIVATE ) {
            $push = new PrivateChannel( $this->channel );
        }
        else{
            $push = new Channel( $this->channel );
        }
        return $push;
    }

    public function broadcastAs()
    {
        return 'notification';
    }
}
