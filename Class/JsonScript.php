<?php

include_once 'Class/CommandQueue.php';
include_once 'Class/Script.php';


/**
 * Description of JsonScript
 *
 * @author pablo
 */
class JsonScript extends Script
{

    protected  $commandQueue;

    public function __construct($json) 
    {
        parent::init(json_decode($json, true));
        print_r(parent::getScript());
    }
    
    

    public function processScript() {
        $this->commandQueue = new CommandQueue;
        $obj = parent::getScript();
        $this->parse($obj['init']);

        $this->commandQueue->process($obj['init']);
    }

    public function parse($block) {
        foreach ($block as $key => $value) {
            if ($this->isFunction($value['cmd'])) {
                $obj = parent::getScript();
                $this->parse($obj[substr($value['cmd'], 1)]);
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
            $obj = parent::getScript();
            return $obj[substr($ref, 1)];
        }
    }
    
    public function getParamId($ref) {
        $obj = parent::getScript();
        return $obj[substr($ref, 1)];
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
