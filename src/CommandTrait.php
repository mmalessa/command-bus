<?php
namespace Mmalessa\CommandBus;

trait CommandTrait
{
    private $payload;

    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function payload(string $key)
    {
        if(!array_key_exists($key, $this->payload)) {
            throw new \InvalidArgumentException(sprintf("Unknown key: %s", $key));
        }
        return $this->payload[$key];
    }
}
