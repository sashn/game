<?php
declare(strict_types=1);

namespace Game;

use Game\Process\Process;

class Game extends Process
{
	protected $players = [];
    protected $gameConfiguration;
    protected $winner = false;

    public function __construct(GameConfiguration $gameConfiguration = null)
    {
        if ($gameConfiguration === null) {
            $gameConfiguration = new GameConfiguration;
        }
        $this->gameConfiguration = $gameConfiguration;
    }

    public function registerPlayer(Player $player)
    {
        $this->cantHaveStarted();
        if (count($this->players) === $this->gameConfiguration->getMaximumPlayers()) {
            throw new TooManyPlayersException;
        }
        foreach ($this->players as $registeredPlayer) {
            if ($registeredPlayer->equals($player)) {
                throw new PlayerAlreadyRegisteredException;
            }
        }
        $player->setGame($this);
        $this->players[] = $player;
    }

    public function start(): void
    {
        if (empty($this->players)) {
            throw new GameStartedWithNoPlayersException;
        }
        if (count($this->players) < $this->gameConfiguration->getMinimumPlayers()) {
            throw new TooFewPlayersException;
        }
        parent::start();
    }

    public function getWinner()
    {
        return $this->winner;
    }

    public function setWinner(Player $player): void
    {
        $this->winner = $player;
    }
}