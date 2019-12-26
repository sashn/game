<?php
declare(strict_types=1);

namespace Game;

class Process
{
    protected $hasStarted = false;
    protected $hasEnded = false;

    public function hasStarted(): bool
    {
        return $this->hasStarted;
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
    }

    public function isInProgress(): bool
    {
        return $this->hasStarted && !$this->hasEnded;
    }

    public function start(): void
    {
        $this->hasStarted = true;
    }

    public function end(): void
    {
        $this->hasEnded = true;
    }

}