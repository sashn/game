<?php
declare(strict_types=1);

namespace Game\ProductGame;

use PHPUnit\Framework\TestCase;

final class ProductGameTest extends TestCase
{
    public function testPlayerWithMostProductBoughtWins(): void
    {
    	$gameOne = new ProductGame;
        $playerOne = new ProductGamePlayer('Jimmy');
        $playerTwo = new ProductGamePlayer('Johnny');
        $gameOne->registerPlayer($playerOne);
        $gameOne->registerPlayer($playerTwo);
        $gameOne->start();
        $playerOne->buyProduct(5);
    	$gameOne->end();
    	$result = $gameOne->getWinner();
        $this->assertEquals(
            $playerOne,
            $result
        );

        $gameTwo = new ProductGame;
        $playerThree = new ProductGamePlayer('Jack');
        $playerFour = new ProductGamePlayer('Jones');
        $gameTwo->registerPlayer($playerThree);
        $gameTwo->registerPlayer($playerFour);
        $gameTwo->start();
        $playerFour->buyProduct(5);
        $gameTwo->end();
        $result = $gameTwo->getWinner();
        $this->assertEquals(
            $playerFour,
            $result
        );
    }
}