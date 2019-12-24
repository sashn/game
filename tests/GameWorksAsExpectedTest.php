<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class GameWorksAsExpectedTest extends TestCase
{
    public function testPlayerCanOnlyBuyProductIfGameHasStarted(): void
    {
        $this->expectException(GameHasNotStartedException::class);
        $game = new Game;
        $playerOne = new Player($game);
        $game->registerPlayer($playerOne);
        $playerOne->buyProduct(4);
    }

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