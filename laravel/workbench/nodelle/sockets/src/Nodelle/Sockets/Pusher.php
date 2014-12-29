<?php namespace Nodelle\Sockets;

use Ratchet\ConnectionInterface as Conn;
use Ratchet\Wamp\WampServerInterface;

class Pusher implements WampServerInterface {
    /**
     * A lookup of all the topics clients have subscribed to
     */
    protected $subscribedTopics = array();

    public function __construct()
    {
        echo "Server started\n";
    }

    public function onSubscribe(Conn $conn, $topic) {
        $this->subscribedTopics[$topic->getId()] = $topic;

        echo "Subscribed to {$topic}";
    }

    public function onUnSubscribe(Conn $conn, $topic)
    {

    }

    public function onOpen(Conn $conn) {

    }

    public function onClose(Conn $conn) {

    }

    public function onMessage(Conn $conn, $msg) {

    }

    public function onCall(Conn $conn, $id, $topic, array $params)
    {

    }

    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible)
    {

    }

    public function onError(Conn $conn, \Exception $e) {

    }

    /**
     * @param string JSON'ified string we'll receive from ZeroMQ
     */
    public function onBlogEntry($entry) {
        $entryData = json_decode($entry, true);

        // If the lookup topic object isn't set there is no one to publish to
        if (!array_key_exists($entryData['category'], $this->subscribedTopics)) {
            return;
        }

        $topic = $this->subscribedTopics[$entryData['category']];

        // re-send the data to all the clients subscribed to that category
        $topic->broadcast($entryData);
    }

    /* The rest of our methods were as they were, omitted from docs to save space */
}