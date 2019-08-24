<?php

require_once(__DIR__ . "/../vendor/autoload.php");
require_once('ExampleCommand.php');
require_once('ExampleCommandHandler.php');

use Mmalessa\CommandBus\CommandBus;
use Mmalessa\CommandBus\Examples\ExampleCommandHandler;
use Mmalessa\CommandBus\Examples\ExampleCommand;

$commandBus = new CommandBus();
$commandBus->subscribe(new ExampleCommandHandler());

$exampleCommand = ExampleCommand::create(1, "Silifon");
$commandBus->handle($exampleCommand);