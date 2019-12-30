<?php
declare(strict_types=1);

namespace Game;

use Game\Players\PlayerAlreadyRegisteredException;
use Game\Players\TooManyPlayersException;
use Game\Process\CantHaveStartedException;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    public function testPlayerCantBeRegisteredIfGameHasStarted(): void
    {
        $this->expectException(CantHaveStartedException::class);
        $game = new Game;
        $playerOne = new Player;
        $game->registerPlayer($playerOne);
        $game->start();
        $playerTwo = new Player;
        $game->registerPlayer($playerTwo);
    }

    public function testRegisteredPlayersMustBeUnique(): void
    {
        $this->expectException(PlayerAlreadyRegisteredException::class);
        $game = new Game;
        $playerOne = new Player;
        $game->registerPlayer($playerOne);
        $game->registerPlayer($playerOne);
    }

    public function testMinimumPlayerLimit(): void
    {
        $this->expectException(TooFewPlayersException::class);
        $gameConfiguration = new GameConfiguration;
        $gameConfiguration->setMinimumPlayers(2);
        $game = new Game($gameConfiguration);
        $playerOne = new Player;
        $game->registerPlayer($playerOne);
        $game->start();
    }

    public function testMaximumPlayerLimit(): void
    {
        $this->expectException(TooManyPlayersException::class);
        $gameConfiguration = new GameConfiguration;
        $gameConfiguration->setMaximumPlayers(1);
        $game = new Game($gameConfiguration);
        $playerOne = new Player;
        $playerTwo = new Player;
        $game->registerPlayer($playerOne);
        $game->registerPlayer($playerTwo);
    }
}