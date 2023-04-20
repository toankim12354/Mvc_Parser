<?php
class GreetingCommand {
    private $receiver;
    public function __construct($receiver) {
        $this->receiver = $receiver;
    }
    public function execute() {
        $this->receiver->greet();
    }
}

class Invoker {
    private $command = array();
    public function setCommand(GreetingCommand $command): void {
        array_push($this->command, $command);
    }
    public function executeCommand(): void {
        if (!empty($this->command)) {
            foreach ($this->command as $command) {
                $command->execute();
            }
        }
    }
}

class Receiver {
    public function greet(): void {
        echo "chao ban";
    }
}

$receiver = new Receiver();
$command = new GreetingCommand($receiver);
$invoker = new Invoker();

$invoker->setCommand($command);
$invoker->executeCommand(); // Output: chao ban
