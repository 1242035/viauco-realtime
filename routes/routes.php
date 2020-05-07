<?php
//socket route
\Viauco\Realtime\Socket\WebSocketsRouter::webSocket( config('websockets.path') , \Viauco\Realtime\Socket\SocketHandler::class);
