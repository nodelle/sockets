<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Nodelle\Sockets\BasicPubSub;

require base() . '/workbench/nodelle/sockets/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new BasicPubSub()
        )
    ),
    8080
);

$server->run();