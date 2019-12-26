<?php
declare(strict_types=1);

namespace Game;

final class TicTacToePlayer extends TurnBasedGamePlayer
{
    public function __construct(TicTacToeGame $game, string $name = 'John Doe')
    {
        parent::__construct($game, $name);
    }

    public function claimField(TicTacToeField $field): void
    {
    	parent::takeTurnBasedAction();
        $field->claim($this);
    }
}