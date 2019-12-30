<?php
declare(strict_types=1);

namespace Game\Process;

class Process
{
    protected $hasStarted = false;
    protected $hasEnded = false;

    public function cantHaveStarted(): void
    {
        if ($this->hasStarted) {
            throw new CantHaveStartedException;
        }
    }

    public function mustBeInProgress(): void
    {
        if (!$this->hasStarted || $this->hasEnded) {
            throw new MustBeInProgressException;
        }
    }

    public function mustHaveEnded(): void
    {
        if (!$this->hasEnded) {
            throw new MustHaveEndedException;
        }
    }

    public function hasEnded(): bool
    {
        return $this->hasEnded;
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