<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class ProductGamePlayerTest extends TestCase
{
    public function testPlayerCanOnlyBuyProductIfGameHasStarted(): void
    {
        $this->expectException(GameHasNotStartedException::class);
        $game = new ProductGame;
        $playerOne = new ProductGamePlayer($game);
        $game->registerPlayer($playerOne);
        $playerOne->buyProduct(4);
    }
}