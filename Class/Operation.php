<?php

include_once 'Class/Script.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operation
 *
 * @author ppeuscovich
 */
abstract class Operation {

    private static $_instances = array();

    public static function getInstance() {
        $class = get_called_class();
        if (!isset(self::$_instances[$class])) {
            self::$_instances[$class] = new $class();
        }
        return self::$_instances[$class];
    }

    public function getParamValue($ref) {
        
        if (is_numeric($ref)) {
            return $ref;
        } else {
            return Script::getValue($ref);
        }
    }

    abstract public function execute($args);
}
