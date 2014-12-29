<?php namespace Nodelle\Sockets;

use Ratchet\ConnectionInterface as Conn;
use Ratchet\Wamp\WampServerInterface;
use Ratchet\MessageComponentInterface;

/**
 * When a user publishes to a topic all clients who have subscribed
 * to that topic will receive the message/event from the publisher
 */
class BasicPubSub implements MessageComponentInterface, WampServerInterface {

    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;

        echo "Server started\n";
    }

    public function onSubscribe(Conn $conn, $topic)
    {
        echo "{$conn->resourceId} subscribed to {$topic}";
    }

    public function onUnSubscribe(Conn $conn, $topic)
    {
        echo "{$conn->resourceId} subscribed to {$topic}";
    }

    public function onOpen(Conn $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onClose(Conn $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onMessage(Conn $conn, $msg) {

    }

    public function onCall(Conn $conn, $id, $topic, array $params)
    {
        // In this application if clients send data it's because the user hacked around in console

    }

    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $event, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            // The sender is not the receiver, send to each client connected
            $client->send($event);
        }
    }

    public function onError(Conn $conn, \Exception $e) {

    }
}