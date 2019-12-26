<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeGame extends Game
{
	private $activePlayer;

    public function __construct()
    {
        parent::__construct(new GameConfiguration(2, 2));
    }

    public function getActivePlayer(): TicTacToePlayer
    {
    	return $this->activePlayer;
    }

    public function start(): void
    {
    	$this->activePlayer = $this->players[0];
        parent::start();
    }

    public function setNextPlayerAsActive(): void
    {
    	if ($this->activePlayer->is($this->players[0])) {
    		$this->activePlayer = $this->players[1];
    	} else {
    		$this->activePlayer = $this->players[0];
    	}
    }
}