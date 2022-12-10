<?php

namespace App\WSHandlers\Auth;

use App\Enums\MessageError;
use App\Models\Player;
use App\Networking\Interfaces\HandlerInterface;
use Ratchet\ConnectionInterface;
use App\Networking\Packets\Packet;
use Log;
use App\WSHandlers\Base\Traits\HandlerTrait;
use App\Networking\Packets\Inbound\PlayerInitialSpawnPacket;

class PlayerInitialSpawnHandler implements HandlerInterface
{
    use HandlerTrait;
    public function handle(ConnectionInterface $connection, Packet $message, Object $type)
    {
        /** @var PlayerInitialSpawnPacket $packetContent */
        $packetContent = $this->buildTypeContent($message, $type);

        $player = Player::whereSteamId($packetContent->SteamId)->first();

        $nPacket = new Packet();
        $nPacket->ID = $message->ID;
        $nPacket->MessageID = $message->MessageID;
        if (!$player) {
            $nPacket->Content = json_encode([
                'error' => MessageError::GM_SERVER_PLAYER_INIT_SPAWN_ERROR
            ]);

        } else {
            $nPacket->Content = json_encode([
                'player' => $player
            ]);
        }
        
        $connection->send(json_encode($nPacket));
    }
}
