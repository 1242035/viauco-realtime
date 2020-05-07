<?php
namespace Viauco\Realtime\Events\Socket;
use Illuminate\Broadcasting\PresenceChannel;

class ChannelSubscribe extends Channel
{
    public function __construct($connection, $request = null)
    {
        parent::__construct($connection, $request);
    }
    
    public function broadcastAs()
    {
        return 'channel-subscribe';
    }
}   
