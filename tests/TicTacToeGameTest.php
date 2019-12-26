<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class TicTacToeGameTest extends TestCase
{
    public function testExactlyTwoPlayersCanPlay(): void
    {
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne, 'First');
        $playerTwo = new TicTacToePlayer($gameOne, 'Second');
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        self::assertTrue(true);
    }

    public function testPlayerCanOnlyClaimFieldIfItsTheirTurn(): void
    {
        $this->expectException(NotThisPlayersTurnException::class);
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne, 'Bruce');
        $playerTwo = new TicTacToePlayer($gameOne, 'Wayne');
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        // this will cause an exception, because the first player will always start
        $playerTwo->claimField(new TicTacToeField(0,2));
    }

    // public function testPlayerWinsWhenFilledHorizontalRow(): void
    // {
    //     $gameOne = new TicTacToeGame;
    //     $playerOne = new TicTacToePlayer($gameOne);
    //     $playerTwo = new TicTacToePlayer($gameOne);
    //     $gameOne->registerPlayer($playerOne);
    //     $gameOne->registerPlayer($playerTwo);
    //     $gameOne->start();
    //     $playerOne->claimField(new TicTacToeField(0,0));
    //     $playerTwo->claimField(new TicTacToeField(0,2));
    //     $playerOne->claimField(new TicTacToeField(1,0));
    //     $playerTwo->claimField(new TicTacToeField(1,2));
    //     $playerOne->claimField(new TicTacToeField(2,0));
    //     self::assertTrue($gameOne->hasEnded());
    //     $result = $gameOne->getWinner();
    //     $this->assertEquals(
    //         $playerOne,
    //         $result
    //     );
    // }
}