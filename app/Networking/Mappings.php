<?php

namespace App\Networking;

use App\Enums\MessageType;
use App\Networking\Packets\Inbound\AuthenticationPacket;
use App\WSHandlers\Auth\AuthenticationHandler;

class Mappings {
    const ID_TO_HANDLER = [
        MessageType::GM_SERVER_AUTHENTICATION_IN => AuthenticationHandler::class,
        MessageType::GM_SERVER_AUTHENTICATION_OUT => "",
    ];

    const ID_TO_TYPE = [
        MessageType::GM_SERVER_AUTHENTICATION_IN => AuthenticationPacket::class,
        // MessageType::GM_SERVER_AUTHENTICATION_OUT => "App\Networking\Packets\Outbound\AuthenticationPacket",
    ];
}