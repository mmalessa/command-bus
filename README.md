# Command bus

Implementation of a simple command bus.  
https://github.com/mmalessa/commandbus  
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
}
```

```php
class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        printf("ID: %s\n", $command->payload('id'));
        printf("Name: %s\n", $command->payload('name'));
    }
}
```

```php
use Mmalessa\CommandBus\CommandBus;

$commandBus = new CommandBus();
$commandBus->subscribe(new ExampleCommandHandler());

$exampleCommand = ExampleCommand::create(1, "Silifon");
$commandBus->handle($exampleCommand);
```
