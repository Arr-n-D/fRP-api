<?php

namespace App\WSHandlers\Base;

use BeyondCode\LaravelWebSockets\Apps\App;
use Illuminate\Support\Facades\Log;
use Ratchet\WebSocket\MessageComponentInterface;

class WebSocketHandler implements MessageComponentInterface
{
    public function onOpen($connection)
    {
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app = App::findById('laravel-websockets');
        $connection->send("p");
    }

    public function onMessage($connection, $message)
    {

    }

    public function onClose($connection)
    {

    }

    public function onError($connection, \Exception $exception)
    {

    }
}