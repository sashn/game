<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeField
{
    private $horizontalCoordinate;
    private $verticalCoordinate;
    private $claimedByPlayer = false;

    public function __construct(int $horizontalCoordinate, int $verticalCoordinate)
    {
        $this->horizontalCoordinate = $horizontalCoordinate;
        $this->verticalCoordinate = $verticalCoordinate;
    }

    public function claim(TicTacToePlayer $player): void
    {
        $this->claimedByPlayer = $player;
    }

    public function isClaimed(): bool
    {
        return $this->claimedByPlayer != false;
    }

}