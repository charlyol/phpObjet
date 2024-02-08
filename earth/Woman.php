<?php

namespace earth;

class Woman extends Human
{
    public function __construct($name = '')
    {
        parent::__construct($name);
    }

    public function enfanter()
    {
        $this->setSecret(secret: 'Je suis une femme');
        return 'oui je peux enfanter!';
    }
}