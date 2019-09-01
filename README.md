# Command bus

Implementation of a simple command bus.  
https://github.com/mmalessa/command-bus  
Use it at your own risk.  

# Install
```shell script
composer req mmalessa/command-bus
```

# Example of use
```php
class ExampleCommand
{
    private $id;
    private $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
```

```php
class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        echo "Example command handler" . PHP_EOL;
        printf("ID: %s\n", $command->getId());
        printf("Name: %s\n", $command->getName());
    }
}
```

```php
use Mmalessa\CommandBus\CommandBus;

$commandBus = new CommandBus();
$commandBus->subscribe(new ExampleCommandHandler());
// The command class is automatically detected based on the type of parameter 
// in the handler 'handle' method.

$command = ExampleCommand::create(1, "Silifon");
$commandBus->handle($command);
```
