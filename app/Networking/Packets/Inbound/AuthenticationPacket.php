<?php

namespace App\Networking\Packets\Inbound;

use App\Networking\Interfaces\IInMessage;

class AuthenticationPacket implements IInMessage
{
    public string $Token;
}
