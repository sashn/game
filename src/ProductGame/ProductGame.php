<?php
declare(strict_types=1);

namespace Game\ProductGame;

use Game\Game;
use Game\Player;

final class ProductGame extends Game
{
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
}