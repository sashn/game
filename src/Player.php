<?php
declare(strict_types=1);

namespace Game;

final class Player
{
	private $productQuantity = 0;
	private $name = 'John Doe';

    public function __construct(string $name)
    {
    	$this->name = $name;
    }

    public function buyProduct(int $quantity): void
    {
    	$this->productQuantity += $quantity;
    }

    public function getProductQuantity()
    {
    	return $this->productQuantity;
    }
    
}