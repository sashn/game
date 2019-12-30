<?php
declare(strict_types=1);

namespace Game\ProductGame;

use Game\Process\MustBeInProgressException;
use PHPUnit\Framework\TestCase;

final class ProductGamePlayerTest extends TestCase
{
    public function testPlayerCanOnlyBuyProductIfGameHasStarted(): void
    {
        $this->expectException(MustBeInProgressException::class);
        $game = new ProductGame;
        $playerOne = new ProductGamePlayer;
        $game->registerPlayer($playerOne);
        $playerOne->buyProduct(4);
    }
}