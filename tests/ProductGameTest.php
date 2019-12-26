<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class ProductGameTest extends TestCase
{
    public function testPlayerWithMostProductBoughtWins(): void
    {
    	$gameOne = new ProductGame;
        $playerOne = new ProductGamePlayer($gameOne, 'Jimmy');
        $playerTwo = new ProductGamePlayer($gameOne, 'Johnny');
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
        $playerThree = new ProductGamePlayer($gameTwo, 'Jack');
        $playerFour = new ProductGamePlayer($gameTwo, 'Jones');
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