<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class GameWorksAsExpectedTest extends TestCase
{
    public function testPlayerWithMostProductBoughtWins(): void
    {
    	$gameOne = new ProductGame;
        $playerOne = new ProductGamePlayer($gameOne);
        $playerTwo = new ProductGamePlayer($gameOne);
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
        $playerThree = new ProductGamePlayer($gameTwo);
        $playerFour = new ProductGamePlayer($gameTwo);
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