<?php
namespace Mmalessa\CommandBus;

trait CommandTrait
{
    private $payload;

    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
