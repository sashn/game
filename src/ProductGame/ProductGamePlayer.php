<?php
declare(strict_types=1);

namespace Game\ProductGame;

use Game\Player;

class ProductGamePlayer extends Player
{
	private $productQuantity = 0;

    public function buyProduct(int $quantity): void
    {
        $this->game->mustBeInProgress();
    	$this->productQuantity += $quantity;
    }

    public function getProductQuantity()
    {
    	return $this->productQuantity;
    }
    
}