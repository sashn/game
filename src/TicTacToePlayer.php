<?php
declare(strict_types=1);

namespace Game;

final class TicTacToePlayer extends Player
{
    public function __construct(TicTacToeGame $game, string $name = 'John Doe')
    {
        parent::__construct($game, $name);
    }

    public function claimField(TicTacToeField $field): void
    {
    	if (!$this->game->getActivePlayer()->is($this)) {
    		throw new NotThisPlayersTurnException;
    	}
        $field->claim($this);
        $this->game->setNextPlayerAsActive();
    }
}