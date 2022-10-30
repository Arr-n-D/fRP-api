<?php 

namespace App\Networking\Interfaces;

use Ratchet\ConnectionInterface;
use App\Networking\Packets\Packet;

interface HandlerInterface
{
    public function handle(ConnectionInterface $connection, Packet $message, Object $type);
}