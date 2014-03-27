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
class addOperation extends Operation 
{
    
    public function execute($args)
    {
        //print_r($args);
        $id = $args['id'];
        $operand1 = parent::getParamValue($args['operand1']);
        $operand2 = parent::getParamValue($args['operand2']);
        Script::setValue($id, $operand1+ $operand2);
        //Script::printScript();
    }
}
