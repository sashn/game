<?php
declare(strict_types=1);

namespace Game\TicTacToe;

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

    public function isClaimed(): bool
    {
        return $this->claimedByPlayer != false;
    }

    public function isClaimedByPlayer(TicTacToePlayer $player): bool
    {
        if ($this->claimedByPlayer === false) {
            return false;
        }
        return $this->claimedByPlayer->equals($player);
    }

}