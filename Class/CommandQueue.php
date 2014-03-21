<?php
class CommandQueue
{
    private $queue;
 
    public function __construct() {
        $this->queue = array();
    }
 
    public function addCommand(Operation $command) {
        $this->queue[] = $command;
    }
 
    public function process() {
        $commandCount = 0;
        foreach ($this->queue as $command) {
            if ($command->execute()) {
                $commandCount++;
            }
        }
        return $commandCount;
    }
}
