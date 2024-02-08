<?php

class Human
{
    public $height = 175;
    public string $lastName;
    public int $force = 1;
    private string $secret;

    public function __construct($name = '')
    {
        $this->lastName = $name;
//        echo 'Je suis né.e';
    }

    public function __destruct()
    {
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
}