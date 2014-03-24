<?php
include_once 'Class/Operation.php';
include_once 'Class/RunTest.php';
include_once 'Class/JsonScript.php';


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
        echo "</br>"."Hola amigos...";
        echo "</br>";      
        //$script[$args[1]] = $args[2] + $args[3];
    }
}
