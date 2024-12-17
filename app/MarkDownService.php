<?php

namespace App;

use Parsedown;

class MarkDownService
{

    protected $parsedown;
    /**
     * Create a new class instance.
     */
    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function Parse($content)
    {
        return $this->parsedown->text($content);
    }
}
