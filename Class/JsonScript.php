<?php

include_once 'Class/CommandQueue.php';
include_once 'Class/Script.php';
include_once 'Class/Stack.php';
include_once 'printOperation.php';
include_once 'addOperation.php';
include_once 'createOperation.php';
include_once 'deleteOperation.php';
include_once 'updateOperation.php';

/**
 * Description of JsonScript
 *
 * @author pablo
 */
class JsonScript {

    protected $commandQueue;
    protected $params;
    protected $stack;

    public function __construct($json) {
        Script::init(json_decode($json, true));
    }

    public function processScript() {
        $this->commandQueue = new CommandQueue;
        $obj = Script::getScript();
        $this->stack = new Stack;
        $this->parse($obj['init']);
        $this->commandQueue->process();
    }

    public function parse($block) {
        foreach ($block as $key => $command) {
            if ($this->isFunction($command['cmd'])) {
                $obj = Script::getScript();
                $this->stack->push($command);
                $this->parse($obj[substr($command['cmd'], 1)]);
            } else {
                $params = $this->stack->peek(); 
                $result[0] = $command;
                $result[1] = $params;
                $this->commandQueue->addCommand(OperationFactory::factory($command['cmd']), $result);
                $this->stack->pop();
            }
        }
    }

    public function isFunction($name) {
        if ($name[0] == "#") {
            return true;
        } else {
            return false;
        }
    }

}
