<?php

include_once 'Class/CommandQueue.php';

/**
 * Description of JsonScript
 *
 * @author pablo
 */
class JsonScript {

    private $script;
    protected  $commandQueue;

    public function __construct($json) {
        $this->script = json_decode($json, true);
        $this->processScript();
    }
    
    public function getScript() 
    {
        return $this->script;
    }
    
    public function setScript($script)
    {
        $this->script = $script;
    }

    public function processScript() {
        $this->commandQueue = new CommandQueue;
        $this->parse($this->script['init']);
        $this->commandQueue->process($this->script['init']);
    }

    public function parse($block) {
        foreach ($block as $key => $value) {
            if ($this->isFunction($value['cmd'])) {
                $this->parse($this->script[substr($value['cmd'], 1)]);
            } else {
                print_r($value);
                $this->processCommand($value);
                echo "</br>";
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

    public function getParamValue($ref) {
        if (is_numeric($ref)) {
            return $ref;
        } else {
            return $this->script[substr($ref, 1)];
        }
    }
    
    public function getParamId($ref) {
        return $this->script[substr($ref, 1)];
    }

    public function processCommand($command) {

        switch ($command['cmd']) {

            case 'print':
                $op1 = $this->getParamValue($command['value']);
                $this->commandQueue->addCommand(OperationFactory::factory('print'), array($op1));
                break;
            case 'add':
                $id = $this->getParamId($command['id']);;
                $op1 = $this->getParamValue($command['operand1']);
                $op2 = $this->getParamValue($command['operand2']);
                $this->commandQueue->addCommand(OperationFactory::factory('add'), array($id,$op1,$op2));
              
                break;
        }
    }

}
