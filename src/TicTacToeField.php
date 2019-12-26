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
        if ($this->claimedByPlayer != false) {
            throw new TicTacToeFieldAlreadyClaimedException("field already claimed by player " . $this->claimedByPlayer->getName());
        }
        $this->claimedByPlayer = $player;
    }

    public function getClaimedByPlayer(): TicTacToePlayer
    {
        if ($this->claimedByPlayer === false) {
            throw new TicTacToeFieldNotYetClaimedException;
        }
        return $this->claimedByPlayer;
    }

}