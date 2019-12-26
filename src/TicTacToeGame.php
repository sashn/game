<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeGame extends TurnBasedGame
{
    public function __construct()
    {
        parent::__construct(new GameConfiguration(2, 2));
    }
}