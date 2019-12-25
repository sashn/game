<?php
declare(strict_types=1);

namespace Game;

final class Game
{
	private $players;
    private $hasStarted = false;
    private $hasEnded = false;

    public function __construct(array $players = [])
    {
        $this->players = $players;
    }

    public function registerPlayer(Player $player)
    {
        if ($this->hasEnded) {
            throw new GameHasEndedException;
        }
        if ($this->hasStarted) {
            throw new GameHasStartedException;
        }
        $this->players[] = $player;
    }

    public function getWinner(): Player
    {
    	$winner = false;
    	$highestQuantity = 0;
    	foreach ($this->players as $player) {
    		if ($player->getProductQuantity() > $highestQuantity) {
    			$highestQuantity = $player->getProductQuantity();
    			$winner = $player;
    		}
    	}
        return $winner;
    }

    public function hasStarted(): bool
    {
        return $this->hasStarted;
    }

    public function start(): void
    {
        if (empty($this->players)) {
            throw new GameStartedWithNoPlayersException;
        }
        $this->hasStarted = true;
    }

    public function end(): void
    {
        $this->hasEnded = true;
    }
}