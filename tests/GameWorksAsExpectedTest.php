<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Game\Game;
use Game\Player;

final class GameWorksAsExpectedTest extends TestCase
{
    public function testGameKnowsAboutPlayersProductQuantity(): void
    {
    	$playerOne = new Player('playerOne');
    	$playerTwo = new Player('playerTwo');

    	$game = new Game([$playerOne, $playerTwo]);

    	$playerOne->buyProduct(5);

    	$result = $game->getPlayerOnesProductQuantity();

        $this->assertEquals(
            5,
            $result
        );
    }

    public function testPlayerWithMostProductBoughtWins(): void
    {
    	$playerOne = new Player('playerOne');
    	$playerTwo = new Player('playerTwo');
    	$gameOne = new Game([$playerOne, $playerTwo]);
    	$playerOne->buyProduct(5);
    	$gameOne->end();
    	$result = $gameOne->getWinner();
        $this->assertEquals(
            $playerOne,
            $result
        );

    	$playerThree = new Player('playerThree');
    	$playerFour = new Player('playerFour');
    	$gameTwo = new Game([$playerThree, $playerFour]);
    	$playerFour->buyProduct(54);
    	$gameTwo->end();
    	$result = $gameTwo->getWinner();
        $this->assertEquals(
            $playerFour,
            $result
        );
    }
}