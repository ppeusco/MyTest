<?php

/**
 * Description of addOperation
 *
 * @author ppeuscovich
 */
class addOperation extends Operation {
    
    private function add($op1,$op2) {
        $result = 0;
        if (is_numeric($op1) and is_numeric($op2)) {
            $result = $op1 + $op2;
        } else {
            $result = $op1 . $op2;
        }
        return $result;
    }
   
    public function execute($command) {        
        $id = $command['id'];
        $operand1 = parent::getParamValue($command['operand1']);
        $operand2 = parent::getParamValue($command['operand2']);
        Script::setValue($id, $this->add($operand1,$operand2));
    }
}
