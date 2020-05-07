<?php
namespace Viauco\Realtime\Events\Socket;

class PrivateUnsubscribe extends Channel
{
    
    public function __construct($connection, $request = null)
    {
        parent::__construct($connection, $request);
    }

    public function broadcastAs()
    {
        return 'private-unsubscribe';
    }
}   
