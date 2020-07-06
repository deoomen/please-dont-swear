<?php

namespace PleaseDontSwear;

class PleaseDontSwear
{
    private array $_curses;

    public function __construct()
    {
        $this->_curses = \json_decode(\file_get_contents(__DIR__ . '/curses-pl.json'));
    }

    public function censor(string $textToCensor): string
    {
        return 'PleaseDontSwear->test';
    }
}
