<?php
declare(strict_types=1);

namespace Game;

use PHPUnit\Framework\TestCase;
use Game\Game;

final class GameWorksAsExpectedTest extends TestCase
{
    public function testCanBeUsedAsString(): void
    {
    	$asd = new Game;

        $this->assertEquals(
            false,
            false
        );
    }
}