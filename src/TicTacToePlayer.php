<?php
declare(strict_types=1);

namespace Game;

final class TicTacToePlayer extends TurnBasedGamePlayer
{
    public function __construct(TicTacToeGame $game, string $name = 'John Doe')
    {
        parent::__construct($game, $name);
    }

    public function claimField(Coordinates $coordinates): void
    {
    	parent::takeTurnBasedAction();
        $this->game->getBoard()->claimField($coordinates, $this);
    }
}