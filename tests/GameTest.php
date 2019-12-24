<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    public function testGameNeedsPlayersToStart(): void
    {
        $this->expectException(GameStartedWithNoPlayersException::class);
        $game = new Game;
        $game->start();
    }
}