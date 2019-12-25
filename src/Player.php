<?php
declare(strict_types=1);

namespace Game;

class Player
{
	protected $game;
    protected $name;

    public function __construct(Game $game, string $name = 'John Doe')
    {
        $this->game = $game;
    	$this->name = $name;
    }
}