<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class TurnBasedGamePlayerTest extends TestCase
{
    public function testPlayerCanOnlyClaimFieldIfItsTheirTurn(): void
    {
        $this->expectException(NotThisPlayersTurnException::class);
        $gameOne = new TurnBasedGame;
        $playerOne = new TurnBasedGamePlayer($gameOne);
        $playerTwo = new TurnBasedGamePlayer($gameOne);
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        // this will cause an exception, because the first player will always start
        $playerTwo->takeTurnBasedAction();
    }
}