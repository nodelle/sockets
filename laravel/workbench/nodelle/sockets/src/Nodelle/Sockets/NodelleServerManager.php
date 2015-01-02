<?php namespace Nodelle\Sockets;

use ZMQ;
use React\ZMQ\Context;
use React\Socket\Server;
use React\EventLoop\Factory;
use Ratchet\Wamp\WampServer;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Illuminate\Console\Command;
use Ratchet\WebSocket\WsServer;
use Nodelle\Sockets\Servers\WampServer as Pusher;

class NodelleServerManager extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'nodelle:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts a new nodelle wampserver.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $loop = Factory::create();
        $pusher = new Pusher;

        $context = new Context($loop);
        $pull = $context->getSocket(ZMQ::SOCKET_PULL);
        $pull->bind('tcp://127.0.0.1:5555');
        $pull->on('message', array($pusher, 'onBlogEntry'));

        // Set up our WebSocket server for clients wanting real-time updates
        $webSock = new Server($loop);
        $webSock->listen(8080, '0.0.0.0'); // Binding to 0.0.0.0 means remotes can connect
        $webServer = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $pusher
                    )
                )
            ),
            $webSock
        );

        $loop->run();
    }

}