<?php
include_once 'Class/Operation.php';

class CommandQueue
{
    private $queue;
 
    public function __construct() {
        $this->queue = array();
    }
    
    public function showQueue()
    {
        print_r($this->queue). "</br>";
    }
 
    public function addCommand(Operation $command,$params) {
        $element = array();
        $element['command'] = $command;
        $element['params'] = $params;
        $this->queue[] = $element;
    }
 
    public function process() {
        foreach ($this->queue as $element) {  
          
            $element['command']->execute($element['params']);
            
            
        }
    }
}
