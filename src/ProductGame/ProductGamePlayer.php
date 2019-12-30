<?php
declare(strict_types=1);

namespace Game\ProductGame;

use Game\Player;
use Game\GameHasNotStartedException;

class ProductGamePlayer extends Player
{
	private $productQuantity = 0;

    public function buyProduct(int $quantity): void
    {
        if (!$this->game->hasStarted()) {
            throw new GameHasNotStartedException;
        }
    	$this->productQuantity += $quantity;
    }

    public function getProductQuantity()
    {
    	return $this->productQuantity;
    }
    
}