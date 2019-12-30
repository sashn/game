<?php
declare(strict_types=1);

namespace Game\Players;

use Game\Game;
use Game\Player;

final class Players implements \ArrayAccess, \Countable, \Iterator
{
    /**
     * @var int
     * used for Iterator
     */
    private $position = 0;
    private $players = [];

    /**
     * @var Game
     */
    private $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function register(Player $player): void
    {
        $this->game->cantHaveStarted();
        $this->cantBeTooManyPlayers();
        $this->cantBeRegistered($player);
        $player->setGame($this->game);
        $this->players[] = $player;
    }

    private function cantBeTooManyPlayers(): void
    {
        if (count($this->players) === $this->game->getGameConfiguration()->getMaximumPlayers()) {
            throw new TooManyPlayersException;
        }
    }

    private function cantBeRegistered(Player $player): void
    {
        foreach ($this->players as $registeredPlayer) {
            if ($registeredPlayer->equals($player)) {
                throw new PlayerAlreadyRegisteredException;
            }
        }
    }

    // ARRAYACCESS IMPLEMENTATIONS
    public function offsetSet($index, $player): void
    {
        if (is_null($index)) {
            $this->players[] = $player;
        } else {
            $this->players[$index] = $player;
        }
    }
    public function offsetExists($index): bool
    {
        return isset($this->players[$index]);
    }
    public function offsetUnset($index): void
    {
        unset($this->players[$index]);
    }
    public function offsetGet($index)
    {
        return isset($this->players[$index]) ? $this->players[$index] : null;
    }

    // COUNTABLE IMPLEMENTATIONS
    public function count(): int
    {
        return count($this->players);
    }

    // ITERATOR IMPLEMENTATIONS
    public function current()
    {
        return $this->players[$this->position];
    }
    public function next()
    {
        ++$this->position;
    }
    public function key()
    {
        return $this->position;
    }
    public function valid()
    {
        return isset($this->players[$this->position]);
    }
    public function rewind()
    {
        $this->position = 0;
    }
}
