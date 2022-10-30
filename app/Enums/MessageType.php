<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MessageType extends Enum
{
    const GM_SERVER_PLAYER_INIT_SPAWN = 1;
    // const GM_SERVER_AUTHENTICATION_OUT = 102;
}
