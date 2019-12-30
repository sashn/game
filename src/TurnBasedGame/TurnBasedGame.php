<?php
declare(strict_types=1);

namespace Game\TurnBasedGame;

use Game\Game;

class TurnBasedGame extends Game
{
    private $activePlayer;

    public function getActivePlayer(): TurnBasedGamePlayer
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
    	if ($this->activePlayer->equals($this->players[0])) {
    		$this->activePlayer = $this->players[1];
    	} else {
    		$this->activePlayer = $this->players[0];
    	}
    }
}