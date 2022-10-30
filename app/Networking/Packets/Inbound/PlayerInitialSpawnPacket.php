<?php

namespace App\Networking\Packets\Inbound;

use App\Networking\Interfaces\IInMessage;

class PlayerInitialSpawnPacket implements IInMessage
{
    public string $SteamId;
}
