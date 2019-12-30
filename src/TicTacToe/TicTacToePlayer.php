<?php
declare(strict_types=1);

namespace Game\TicTacToe;

use Game\TurnBasedGame\TurnBasedGamePlayer;
use Game\Coordinates;

final class TicTacToePlayer extends TurnBasedGamePlayer
{
    public function claimField(Coordinates $coordinates): void
    {
        $this->game->mustBeInProgress();
    	parent::takeTurnBasedAction();
        $this->game->getBoard()->claimField($coordinates, $this);
    }
}