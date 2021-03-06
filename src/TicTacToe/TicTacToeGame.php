<?php
declare(strict_types=1);

namespace Game\TicTacToe;

use Game\TurnBasedGame\TurnBasedGame;
use Game\GameConfiguration;

final class TicTacToeGame extends TurnBasedGame
{
    /**
     * @var TicTacToeBoard
     */
    private $board;

    public function __construct()
    {
        parent::__construct(new GameConfiguration(2, 2));
      	$this->board = new TicTacToeBoard($this);
    }

    public function getBoard(): TicTacToeBoard
    {
        return $this->board;
    }
}