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

        if (!$player) {
            Log::info('PlayerInitialSpawnHandler: Player not found');
            $connection->send(json_encode([
                'MessageID' => $message->MessageID, 
                'Error' => MessageError::GM_SERVER_PLAYER_INIT_SPAWN_ERROR,
                'Message' => "Player wasn't found",
            ]));
        }

    }
}
