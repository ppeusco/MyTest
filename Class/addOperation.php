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
        echo "</br>"."Hola amigos...";
        echo "</br>";   
        $aux = Script::getScript();

        $aux['pablo'] = 5201;
        print_r($aux);
        
        Script::setScript($aux);
        print_r(Script::getScript());
        
        echo "</br>"."Chau amigos...";
        //$script[$args[1]] = $args[2] + $args[3];
    }
}
