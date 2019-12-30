<?php
declare(strict_types=1);

namespace Game;

use Game\Players\Players;
use Game\Process\Process;

class Game extends Process
{
    /**
     * @var Players
     */
    protected $players;

    /**
     * @var GameConfiguration
     */
    protected $gameConfiguration;

    protected $winner = false;

    public function __construct(GameConfiguration $gameConfiguration = null)
    {
        if ($gameConfiguration === null) {
            $gameConfiguration = new GameConfiguration;
        }
        $this->gameConfiguration = $gameConfiguration;
        $this->players = new Players($this);
    }

    public function registerPlayer(Player $player)
    {
        $this->players->register($player);
    }

    public function start(): void
    {
        $this->players->cantBeTooFewPlayers();
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

    public function getGameConfiguration(): GameConfiguration
    {
        return $this->gameConfiguration;
    }
}