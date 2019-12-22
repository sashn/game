<?php
declare(strict_types=1);

namespace Game;

final class Game
{
	private $players;

    public function __construct(array $players)
    {
    	$this->players = $players;
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
    
    public function getPlayerOnesProductQuantity(): int
    {
    	return $this->players[0]->getProductQuantity();
    }

    public function end(): void
    {
    }
}