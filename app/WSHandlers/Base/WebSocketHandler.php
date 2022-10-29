<?php

namespace App\WSHandlers\Base;

use App\Networking\Packets\Packet;
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

    }

    public function onMessage($connection, $message)
    {
        $message = json_decode($message, true);
        // loop over message and field Packet fields
        $packet = new Packet();
        foreach ($message as $key => $value) {
            $packet->$key = $value;
        }
        Log::info(json_encode($packet));
        // cast message to Packet object
        // $packet = Packet::
        // Log::info($message);
        // $messageContent = json_encode(json_decode(($message['Content']), true), JSON_PRETTY_PRINT);
        // // // $messageContent =
        // Log::info($messageContent);
    
    }

    public function onClose($connection)
    {

    }

    public function onError($connection, \Exception $exception)
    {

    }
}