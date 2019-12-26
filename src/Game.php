<?php
declare(strict_types=1);

namespace Game;

class Game
{
	protected $players = [];
    protected $hasStarted = false;
    protected $hasEnded = false;
    protected $gameConfiguration;

    public function __construct(GameConfiguration $gameConfiguration = null)
    {
        if ($gameConfiguration === null) {
            $gameConfiguration = new GameConfiguration;
        }
        $this->gameConfiguration = $gameConfiguration;
    }

    public function registerPlayer(Player $player)
    {
        if ($this->hasEnded) {
            throw new GameHasEndedException;
        }
        if ($this->hasStarted) {
            throw new GameHasStartedException;
        }
        if (count($this->players) === $this->gameConfiguration->getMaximumPlayers()) {
            throw new TooManyPlayersException;
        }
        foreach ($this->players as $registeredPlayer) {
            if ($registeredPlayer->is($player)) {
                throw new PlayerAlreadyRegisteredException;
            }
        }
        $this->players[] = $player;
    }

    public function hasStarted(): bool
    {
        return $this->hasStarted;
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
    }

    public function start(): void
    {
        if (empty($this->players)) {
            throw new GameStartedWithNoPlayersException;
        }
        if (count($this->players) < $this->gameConfiguration->getMinimumPlayers()) {
            throw new TooFewPlayersException;
        }
        $this->hasStarted = true;
    }

    public function end(): void
    {
        $this->hasEnded = true;
    }
}