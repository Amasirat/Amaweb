<?php

namespace App;

use Parsedown;

class MarkDownService
{

    public static function Parse($content)
    {
        $parsedown = new Parsedown();
        return $parsedown->text($content);
    }
}
