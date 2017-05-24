<?php

namespace DeBandai;

class Player
{
    private $is_winner;

    public function __construct()
    {
        $this->is_winner = false;
    }

    public function setWinner()
    {
        $this->is_winner = true;
    }

    public function isWinner()
    {
        return $this->is_winner;
    }
}