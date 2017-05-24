<?php

namespace Tests\Unit;


use DeBandai\Game;
use DeBandai\Grid;

class GameTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function new_game_has_an_empty_a_grid(){

        $game = new Game();
        $grid = $game->getGrid();
        $this->assertTrue($grid->isEmpty());
    }

    /**
     * @test
     */
    public function new_game_is_not_finished()
    {
        $game = new Game();
        $this->assertFalse($game->isFinished());
    }

    /**
     * @test
     */
    public function a_non_existent_player_cannot_be_picked_from_a_game()
    {
        $game = new Game();
        $player = $game->getPlayer(5);
        
        $this->assertFalse($player);
    }

    /**
     * @test
     */
    public function game_has_exactly_two_players()
    {
        $game = new Game();
        $playerIds = array(1,2,3,4,5,6);
        $players = [];
        foreach($playerIds as $id)
            if($game->getPlayer($id))
                $players[] = $game->getPlayer($id);

        $this->assertCount(2,$players);
    }

    /**
     * @test
     */
    public function game_is_set_finished_properly()
    {
        $game = new Game();
        $game->setFinished(2);

        $this->assertTrue($game->isFinished());
    }

    /**
     * @test
     */
    public function when_game_is_finished_a_winner_is_set_properly()
    {
        $game = new Game();
        $game->setFinished(2);
        $winner = $game->getPlayer(2);

        $this->assertSame($winner,$game->getWinner());
    }

    // ======================== Helpers =========================
}