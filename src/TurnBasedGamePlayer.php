<?php
declare(strict_types=1);

namespace Game;

class TurnBasedGamePlayer extends Player
{
    public function __construct(TurnBasedGame $game, string $name = 'John Doe')
    {
        parent::__construct($game, $name);
    }

    public function takeTurnBasedAction(): void
    {
    	if (!$this->game->getActivePlayer()->is($this)) {
    		throw new NotThisPlayersTurnException;
    	}
        $this->game->setNextPlayerAsActive();
    }
}