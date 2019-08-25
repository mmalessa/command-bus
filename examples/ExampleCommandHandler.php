<?php
namespace Mmalessa\CommandBus\Examples;

class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        var_dump($command->payload());
    }
}
