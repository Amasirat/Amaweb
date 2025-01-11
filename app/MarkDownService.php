<?php

namespace App;

use Parsedown;

/*
/ Use the Parse method from this class to turn

*/
class MarkDownService
{
    public static function Parse($content)
    {
        $parsedown = new Parsedown();
        return $parsedown->text($content);
    }
}
