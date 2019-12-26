<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class TicTacToePlayerTest extends TestCase
{
    public function testCantClaimAlreadyClaimedField(): void
    {
        $this->expectException(TicTacToeFieldAlreadyClaimedException::class);
        $gameOne = new TicTacToeGame;
        $playerOne = new TicTacToePlayer($gameOne);
        $playerTwo = new TicTacToePlayer($gameOne);
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->claimField(new TicTacToeField(0,2));
        $playerTwo->claimField(new TicTacToeField(0,2));
    }
}