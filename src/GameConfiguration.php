<?php
declare(strict_types=1);

namespace Game;

final class GameConfiguration
{
    private $minimumPlayers;
    private $maximumPlayers;

    public function __construct(int $minimumPlayers = 1, int $maximumPlayers = 999999)
    {
        $this->minimumPlayers = $minimumPlayers;
        $this->maximumPlayers = $maximumPlayers;
    }

    public function getMinimumPlayers(): int
    {
        return $this->minimumPlayers;
    }

    public function getMaximumPlayers(): int
    {
        return $this->maximumPlayers;
    }

    public function setMinimumPlayers(int $minimumPlayers): void
    {
        $this->minimumPlayers = $minimumPlayers;
    }

    public function setMaximumPlayers(int $maximumPlayers): void
    {
        $this->maximumPlayers = $maximumPlayers;
    }
}