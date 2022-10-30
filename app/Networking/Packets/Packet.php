<?php

namespace App\Networking\Packets;

use App\Networking\Interfaces\IInMessage;
use App\Networking\Interfaces\IOutMessage;

class Packet implements IOutMessage, IInMessage
{
    public int $ID;
    public string $Content;
    public int $MessageID;
}
