<?php
namespace Mmalessa\CommandBus;

use InvalidArgumentException;
use ReflectionClass;

final class CommandBus
{
    private $commandHandlers = [];

    public function subscribe(object $handlerClass)
    {
        $handlerClassName = get_class($handlerClass);
        $handlerReflectionClass = new ReflectionClass($handlerClassName);
        if (!$handlerReflectionClass->hasMethod('handle')) {
            throw new InvalidArgumentException(
                sprintf('There must be a "handle" method in the "%s" class.', $handlerClassName)
            );
        }

        $commandReflectionClass = $handlerReflectionClass->getMethod('handle')->getParameters()[0]->getClass();
        $this->commandHandlers[$commandReflectionClass->getName()] = $handlerClass;
    }
    public function handle(object $command): void
    {
        $commandClassName = get_class($command);
        if(!array_key_exists($commandClassName, $this->commandHandlers)) {
            throw new InvalidArgumentException(sprintf('No handler has been registered for command: %s', $commandClassName));
        }
        ($this->commandHandlers[$commandClassName])->handle($command);
    }
}
