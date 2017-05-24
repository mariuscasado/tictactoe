<?php

namespace DeBandai;

class Game
{
    /** @var Grid */
    protected $grid;

    /** @var Player[] */
    private $players;

    /** @var bool */
    private $finished;


    /**
     * Game constructor.
     *
     */
    public function __construct()
    {
        $this->grid = new Grid();
        $this->players[1] = new Player();
        $this->players[2] = new Player();
        $this->finished = false;

    }

    public function getGrid(): Grid
    {
        return $this->grid;
    }

    public function getPlayer(int $id)
    {   
        if(isset($this->players[$id]))
            return $this->players[$id];

        return false;
    }


    public function getWinner()
    {
        if ($this->finished) {
            foreach ($this->players as $player) {
                if ($player->isWinner())
                    return $player;
            }
        }

        return false;
    }

    public function isFinished(): bool
    {   
        return $this->finished;
    }

    public function setFinished(int $winner)
    {
        if (isset($this->players[$winner])){
            $this->players[$winner]->setWinner();
            $this->finished = true;
        }

        return $this;
    }
}