<?php

namespace earth;

class Man extends Human
{
    public int $force = 2;

    function hairiness(): string
    {
        return 'j\'ai tout pleins des poils di partout';
    }
}