<?php

include_once 'Class/Operation.php';
include_once 'Class/JsonScript.php';
include_once 'Class/Script.php';




/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addOperation
 *
 * @author ppeuscovich
 */
class addOperation extends Operation {

    private function changeParams($command) {
        $result = array();
        foreach ($command[0] as $key => $value) {
            if ($value[0] === '$') {
                $result[$key] = $command[1][substr($value, 1)];
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
   
    public function execute($args) {        
        $command = $this->changeParams($args);
        $id = $command['id'];
        $operand1 = parent::getParamValue($command['operand1']);
        $operand2 = parent::getParamValue($command['operand2']);
        Script::setValue($id, $operand1+ $operand2);
        //Script::printScript();
    }

}
