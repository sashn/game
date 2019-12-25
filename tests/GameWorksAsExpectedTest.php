<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class GameWorksAsExpectedTest extends TestCase
{
    public function testPlayerWithMostProductBoughtWins(): void
    {
    	$gameOne = new Game;
        $playerOne = new Player($gameOne);
        $playerTwo = new Player($gameOne);
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

        $gameTwo = new Game;
        $playerThree = new Player($gameTwo);
        $playerFour = new Player($gameTwo);
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