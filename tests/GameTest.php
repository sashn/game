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

    public function testPlayerCantBeRegisteredIfGameHasStarted(): void
    {
        $this->expectException(GameHasStartedException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $game->start();
        $playerTwo = new Player($game);
        $game->registerPlayer($playerTwo);
    }

    public function testPlayerCantBeRegisteredIfGameHasEnded(): void
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

    public function testRegisteredPlayersMustBeUnique(): void
    {
        $this->expectException(PlayerAlreadyRegisteredException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $game->registerPlayer($playerOne);
    }

    public function testMinimumPlayerLimit(): void
    {
        $this->expectException(TooFewPlayersException::class);
        $gameConfiguration = new GameConfiguration;
        $gameConfiguration->setMinimumPlayers(2);
        $game = new Game($gameConfiguration);
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $game->start();
    }

    public function testMaximumPlayerLimit(): void
    {
        $this->expectException(TooManyPlayersException::class);
        $gameConfiguration = new GameConfiguration;
        $gameConfiguration->setMaximumPlayers(1);
        $game = new Game($gameConfiguration);
        $playerOne = new Player($game);
        $playerTwo = new Player($game);
        $game->registerPlayer($playerOne);
        $game->registerPlayer($playerTwo);
    }
}