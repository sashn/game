<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeGame extends TurnBasedGame
{
	private $board;

    public function __construct()
    {
        parent::__construct(new GameConfiguration(2, 2));
      	$this->createBoard();
    }

    private function createBoard()
    {
        for ($i=0; $i < 3; $i++) { 
        	for ($j=0; $j < 3; $j++) { 
	        	$this->board[$i][$j] = new TicTacToeField;
	        }
        }
    }

    public function claimField(Coordinates $coordinates, TicTacToePlayer $player): void
    {
    	$x = $coordinates->getHorizontalCoordinate();
    	$y = $coordinates->getVerticalCoordinate();
        $this->board[$x][$y]->claim($player);
    }
}