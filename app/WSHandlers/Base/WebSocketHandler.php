<?php

namespace App\WSHandlers\Base;

use App\Networking\Interfaces\HandlerInterface;
use App\Networking\Packets\Packet;
use Arr;
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
        $packet = new Packet();        
        
        foreach ($message as $key => $value) {
            $packet->$key = $value;
        }
        
        $handler = $this->getMessageHandler($message['ID']);
        $type = $this->getMessageType($message['ID']);
        $type = new $type();

        $handler->handle($connection, $packet, $type);
    
    }

    public function onClose($connection)
    {

    }

    public function onError($connection, \Exception $exception)
    {

    }

    private function getMessageHandler(int $id) : HandlerInterface
    {
        $handler = \App\Networking\Mappings::ID_TO_HANDLER[$id];
        return new $handler();
    }

    private function getMessageType(int $id) : string
    {
        $type = \App\Networking\Mappings::ID_TO_TYPE[$id];
        return $type;
    }
}