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

    public function testPlayerWinsWhenFilledHorizontalRow(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne);
        $playerTwo = new TicTacToePlayer($gameOne);
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new TicTacToeField(0,0));
        $playerTwo->claimField(new TicTacToeField(0,2));
        $playerOne->claimField(new TicTacToeField(1,0));
        $playerTwo->claimField(new TicTacToeField(1,2));
        $playerOne->claimField(new TicTacToeField(2,0));
        self::assertTrue($gameOne->hasEnded());
        $result = $gameOne->getWinner();
        $this->assertEquals(
            $playerOne,
            $result
        );
    }
}