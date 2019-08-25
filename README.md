# Command bus

Implementation of a simple command bus.  
https://github.com/mmalessa/command-bus  
Use it at your own risk.  

# Install
```shell script
composer req mmalessa/command-bus
```

# Usage
```php
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
        return $this->payload['id'];
    }

    public function name()
    {
        return $this->payload['name'];
    }
}
```

```php
class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        var_dump($command->payload());
    }
}
```

```php
use Mmalessa\CommandBus\CommandBus;

$commandBus = new CommandBus();
$commandBus->subscribe(new ExampleCommandHandler());
// The command class is automatically detected based on the type of parameter 
// in the handler 'handle' method.

$exampleCommand = ExampleCommand::create(1, "Silifon");
$commandBus->handle($exampleCommand);
```
