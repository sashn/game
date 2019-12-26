<?php
declare(strict_types=1);

namespace Game\ProductGame;

use PHPUnit\Framework\TestCase;

use Game\GameHasNotStartedException;

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