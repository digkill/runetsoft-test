<?php

namespace App\Service;

class Context
{
    private $strategy;
    public function __construct(StrategyInterface $strategy = null)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function handle(): void
    {

        $result = $this->strategy->handle();

    }
}