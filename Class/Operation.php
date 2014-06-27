<?php

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
    
    public function writeln($msg) {
        echo $msg . "</br>";
    }

    abstract public function execute($args);
}
