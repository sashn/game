<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class TicTacToeGameTest extends TestCase
{
    public function testExactlyTwoPlayersCanPlay(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne);
        $playerTwo = new TicTacToePlayer($gameOne);
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        self::assertTrue(true);
    }

    public function testCantClaimAlreadyClaimedField(): void
    {
        $this->expectException(TicTacToeFieldAlreadyClaimedException::class);
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne);
        $playerTwo = new TicTacToePlayer($gameOne);
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new Coordinates(0,2));
        $playerTwo->claimField(new Coordinates(0,2));
    }

    public function testPlayerWinsWhenFilledHorizontalRow(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne);
        $playerTwo = new TicTacToePlayer($gameOne);
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
}