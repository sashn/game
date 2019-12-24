<?php
declare(strict_types=1);

namespace Game;

final class Player
{
	private $productQuantity = 0;
    private $name;
	private $game;

    public function __construct(Game $game, string $name = 'John Doe')
    {
        $this->game = $game;
    	$this->name = $name;
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