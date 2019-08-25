<?php
namespace Mmalessa\CommandBus;

interface Command
{
    public function __construct(array $payload = []);
    public function payload(): array;
}
