<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    public function testGameNeedsPlayersToStart(): void
    {
        $this->expectException(GameStartedWithNoPlayersException::class);
        $game = new Game;
        $game->start();
    }

    public function testGameCantBeStartedForPlayerToBeRegistered(): void
    {
        $this->expectException(GameHasStartedException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $game->start();
        $playerTwo = new Player($game);
        $game->registerPlayer($playerTwo);
    }

    public function testGameCantBeEndedForPlayerToBeRegistered(): void
    {
        $this->expectException(GameHasEndedException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $game->start();
        $game->end();
        $playerTwo = new Player($game);
        $game->registerPlayer($playerTwo);
    }

//     public function testRegisteredPlayersMustBeUnique(): void
//     {
		// TODO
//     }
}