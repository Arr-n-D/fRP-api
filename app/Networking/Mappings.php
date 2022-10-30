<?php

namespace App\Networking;

use App\Enums\MessageType;
use App\Networking\Packets\Inbound\PlayerInitialSpawnPacket;
use App\WSHandlers\Auth\PlayerInitialSpawnHandler;

class Mappings {
    const ID_TO_HANDLER = [
        MessageType::GM_SERVER_PLAYER_INIT_SPAWN => PlayerInitialSpawnHandler::class,
        // MessageType::GM_SERVER_AUTHENTICATION_OUT => "",
    ];

    const ID_TO_TYPE = [
        MessageType::GM_SERVER_PLAYER_INIT_SPAWN => PlayerInitialSpawnPacket::class,
        // MessageType::GM_SERVER_AUTHENTICATION_OUT => "App\Networking\Packets\Outbound\AuthenticationPacket",
    ];
}