<?php
namespace Mmalessa\CommandBus\Examples;

class ExampleCommandHandler
{
    private $someParameter;

    public function __construct(string $someParameter)
    {
        $this->someParameter = $someParameter;
    }

    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        printf("ID: %s\n", $command->id());
        printf("Name: %s\n", $command->name());
        printf("SomeParameter: %s\n", $this->someParameter);
    }
}
