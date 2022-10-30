<?php

namespace App\WSHandlers\Auth;

use App\Networking\Interfaces\HandlerInterface;
use Ratchet\ConnectionInterface;
use App\Networking\Packets\Packet;
use Log;
use App\WSHandlers\Base\Traits\HandlerTrait;

class PlayerInitialSpawnHandler implements HandlerInterface
{
    use HandlerTrait;
    public function handle(ConnectionInterface $connection, Packet $message, Object $type)
    {       
        /** @var PlayerInitialSpawnPacket $packetContent */
        $packetContent = $this->buildTypeContent($message, $type);

        Log::info(get_class($packetContent));

        $connection->send(json_encode([
            'ID' => 1,
            'Content' => json_encode([
                "foobar" => "barfoo"
            ]),
            'MessageID' => $message->MessageID,
            'TimeSinceReceived' => 0
        ]));

        // $packet->Content = $type;       
        // print the type of message content

    }
}
