<?php
declare(strict_types=1);

namespace Game\TicTacToe;

use PHPUnit\Framework\TestCase;
use Game\Coordinates;

final class TicTacToeGameTest extends TestCase
{
    public function testExactlyTwoPlayersCanPlay(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        self::assertTrue(true);
    }

    public function testCantClaimAlreadyClaimedField(): void
    {
        $this->expectException(TicTacToeFieldAlreadyClaimedException::class);
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(0,2));
        $playerTwo->claimField(new Coordinates(0,2));
    }

    public function testPlayerWinsWhenFilledHorizontalRow(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(0,0));
        $playerTwo->claimField(new Coordinates(0,2));
        $playerOne->claimField(new Coordinates(1,0));
        $playerTwo->claimField(new Coordinates(1,2));
        $playerOne->claimField(new Coordinates(2,0));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            $playerOne,
            $result
        );
    }

    public function testPlayerWinsWhenFilledVerticalColumn(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(0,0));
        $playerTwo->claimField(new Coordinates(0,2));
        $playerOne->claimField(new Coordinates(1,0));
        $playerTwo->claimField(new Coordinates(0,1));
        $playerOne->claimField(new Coordinates(1,1));
        $playerTwo->claimField(new Coordinates(2,1));
        $playerOne->claimField(new Coordinates(1,2));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            $playerOne,
            $result
        );
    }

    public function testPlayerWinsWhenFilledDescendingDiagonal(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(1,0));
        $playerTwo->claimField(new Coordinates(0,0));
        $playerOne->claimField(new Coordinates(0,1));
        $playerTwo->claimField(new Coordinates(1,1));
        $playerOne->claimField(new Coordinates(1,2));
        $playerTwo->claimField(new Coordinates(2,2));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            $playerTwo,
            $result
        );
    }

    public function testPlayerWinsWhenFilledAscendingDiagonal(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(1,0));
        $playerTwo->claimField(new Coordinates(0,2));
        $playerOne->claimField(new Coordinates(0,1));
        $playerTwo->claimField(new Coordinates(1,1));
        $playerOne->claimField(new Coordinates(0,0));
        $playerTwo->claimField(new Coordinates(2,0));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            $playerTwo,
            $result
        );
    }

    public function testGameCanEndWithoutWinner(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer;
        $playerTwo = new TicTacToePlayer;
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(1,1));
        $playerTwo->claimField(new Coordinates(0,0));
        $playerOne->claimField(new Coordinates(1,0));
        $playerTwo->claimField(new Coordinates(1,2));
        $playerOne->claimField(new Coordinates(0,1));
        $playerTwo->claimField(new Coordinates(2,1));
        $playerOne->claimField(new Coordinates(0,2));
        $playerTwo->claimField(new Coordinates(2,0));
        $playerOne->claimField(new Coordinates(2,2));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            false,
            $result
        );
    }
}