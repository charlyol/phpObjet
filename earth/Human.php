<?php

namespace earth;
use Bipede;

class Human implements \earth\Mammal
{
    use Bipede;

    public static int $population = 0;
    public $height = 175;
    public string $lastName;
    public int $force = 1;
    private string $secret;

    public function __construct($name = '')
    {
        $this->lastName = $name;
        Human::$population++;
//        echo 'Je suis né.e';
    }

    public function __destruct()
    {
        self::$population--;
//        echo 'Je suis mort.e';
    }


    public function iAmWalking()
    {
        return 'Je marche.';
    }

    public function myHeight()
    {
        return $this->height + 1;
    }

    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    function hairiness(): string
    {
        return 'j\'ai des poils';
    }
}