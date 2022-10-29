<?php

namespace App\WSHandlers\Auth;

use App\Networking\Interfaces\HandlerInterface;
use Ratchet\ConnectionInterface;
use App\Networking\Packets\Packet;
use Log;

class AuthenticationHandler implements HandlerInterface
{
    public function handle(ConnectionInterface $connection, Packet $message)
    {
        // print the type of message content
        Log::info(get_class($message->Content));

    }
}
