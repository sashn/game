<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class PlayerTest extends TestCase
{
    public function testPlayerCanOnlyBuyProductIfGameHasStarted(): void
    {
        $this->expectException(GameHasNotStartedException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $playerOne->buyProduct(4);
    }
}