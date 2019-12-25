<?php
declare(strict_types=1);

namespace Game;

class ProductGamePlayer extends Player
{
	private $productQuantity = 0;

    public function __construct(ProductGame $game, string $name = 'John Doe')
    {
        parent::__construct($game, $name);
    }

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