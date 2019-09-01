<?php
namespace Mmalessa\CommandBus\Examples;

class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        printf ("ID: %s\n", $command->getId());
        printf("Name: %s\n", $command->getName());
    }
}
