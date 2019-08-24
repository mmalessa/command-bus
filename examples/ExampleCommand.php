<?php
namespace Mmalessa\CommandBus\Examples;

use Mmalessa\CommandBus\Command;
use Mmalessa\CommandBus\CommandTrait;

class ExampleCommand implements Command
{
    use CommandTrait;

    public static function create(int $id, string $name)
    {
        return new self(
            [
                'id' => $id,
                'name' => $name
            ]
        );
    }

    public function id()
    {
        return $this->payload('id');
    }

    public function name()
    {
        return $this->payload('name');
    }
}
