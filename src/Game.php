<?php
declare(strict_types=1);

namespace Game;

use Game\Players\Players;
use Game\Process\Process;
use Game\Process\ProcessInterface;

class Game implements ProcessInterface
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

    /**
     * @var ProcessInterface
     */
    private $processBehavior;

    public function __construct(GameConfiguration $gameConfiguration = null)
    {
        if ($gameConfiguration === null) {
            $gameConfiguration = new GameConfiguration;
        }
        $this->gameConfiguration = $gameConfiguration;
        $this->players = new Players($this);
        $this->processBehavior = new Process;
    }

    public function registerPlayer(Player $player)
    {
        $this->players->register($player);
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

    // PROCESSINTERFACE IMPLEMENTATIONS - ALL PASSING TO PROCESS
    public function cantHaveStarted(): void
    {
        $this->processBehavior->cantHaveStarted();
    }
    public function mustBeInProgress(): void
    {
        $this->processBehavior->mustBeInProgress();
    }
    public function mustHaveEnded(): void
    {
        $this->processBehavior->mustHaveEnded();
    }
    public function hasEnded(): bool
    {
        return $this->processBehavior->hasEnded();
    }
    public function end(): void
    {
        $this->processBehavior->end();
    }
    public function start(): void
    {
        $this->players->cantBeTooFewPlayers();
        $this->processBehavior->start();
    }
}