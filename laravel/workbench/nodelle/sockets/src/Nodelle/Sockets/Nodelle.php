<?php namespace Nodelle\Sockets;

use ZMQ;
use ZMQContext;

class Nodelle {

    public function send(array $input)
    {
        $context = new ZMQContext();
        $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
        $socket->connect("tcp://127.0.0.1:5555");

        $socket->send(json_encode($input));
    }
} 