<?php
declare(strict_types=1);

namespace Game;

class Player
{
    protected $id;

    /**
     * @var Game
     */
    protected $game;
    protected $name;

    public function __construct(string $name = 'John Doe')
    {
        $this->id = uniqid();
    	$this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function equals(Player $player): bool
    {
        // this could compare names instead. depends on what should be unique for a player
        return $this->id === $player->getId();
    }
}