<?php

namespace App\WSHandlers\Base\Traits;

trait HandlerTrait {

    public function buildTypeContent($message, $type) : Object {
        $content = json_decode($message->Content, true);
        foreach ($content as $key => $value) {
            $type->$key = $value;
        }

        return $type;
    }
}