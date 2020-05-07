<?php
namespace Viauco\Realtime\Socket\Channels;

use stdClass;
use Ratchet\ConnectionInterface;

class PrivateChannel extends \BeyondCode\LaravelWebSockets\WebSockets\Channels\PrivateChannel
{
    protected $storage = [];

    public function subscribe(ConnectionInterface $connection, stdClass $payload)
    {
        $this->storage[$connection->resourceId] = ['connection' => $connection,'payload' => $payload];
		event( new \Viauco\Realtime\Events\Socket\PrivateSubscribe($connection->resourceId, $payload) );
		parent::subscribe($connection, $payload);
    }

    public function unsubscribe(ConnectionInterface $connection)
    {
        $payload = $this->storage[$connection->resourceId]['payload'] ?? null;
        if ( isset( $this->storage[$connection->resourceId] )) { unset( $this->storage[$connection->resourceId] ); }
		event( new \Viauco\Realtime\Events\Socket\PrivateUnsubscribe($connection->resourceId, $payload) );
		parent::unsubscribe($connection);
    }
}