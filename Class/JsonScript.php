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
                if (!$this->isPrimitiveFunction($params['cmd'].'Operation')) 
                {
                    $vars = $this->changeParams($command, $params);
                    $this->stack->pop();
                } else {
                    $vars = $command;
                }
                print_r($vars);
                $this->commandQueue->addCommand(OperationFactory::factory($command['cmd']), $vars);
                
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

    private function changeParams($command, $params) {
        $result = array();
        foreach ($command as $key => $value) {
            $result[$key] = $params[substr($value, 1)];
        }
        return $result;
    }
    
    private function isPrimitiveFunction($name) {
        $result =  (class_exists($name)) ? true : false;
    }

}
