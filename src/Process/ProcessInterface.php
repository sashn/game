<?php
declare(strict_types=1);

namespace Game\Process;

interface ProcessInterface
{
    public function cantHaveStarted(): void;

    public function mustBeInProgress(): void;

    public function mustHaveEnded(): void;

    public function hasEnded(): bool;

    public function start(): void;

    public function end(): void;
}