<?php
declare(strict_types=1);

namespace Game;

final class TicTacToeField
{
    private $claimedByPlayer = false;

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