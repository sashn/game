<?php
declare(strict_types=1);

namespace Game;

final class Coordinates
{
    private $horizontalCoordinate;
    private $verticalCoordinate;

    public function __construct(int $horizontalCoordinate, int $verticalCoordinate)
    {
        $this->horizontalCoordinate = $horizontalCoordinate;
        $this->verticalCoordinate = $verticalCoordinate;
    }

    public function getHorizontalCoordinate(): int
    {
        return $this->horizontalCoordinate;
    }

    public function getVerticalCoordinate(): int
    {
        return $this->verticalCoordinate;
    }
}