<?php

class Script {

    public static $script;

    public static function init($script) {
        self::$script = $script;
        dbClass::init();
    }

    public function getScript() {
        return self::$script;
    }

    public static function setScript($script) {
        self::$script = $script;
    }

    public static function printScript() {
        foreach (self::$script as $key => $value) {
            print_r($value);
            echo "</br>";
        }
    }

    public function getValue($ref) {
        $key = substr($ref, 1);
        if (isset(self::$script[$key])) {
            return(self::$script[$key]);
        } else {
            return(dbClass::getVarValue($key));
        }
    }

    public function setValue($var, $ref) {
        self::$script[$var] = $ref;
        dbClass::insert(array('name' => $var, 'value' => $ref), false);
    }

    public function deleteValue($ref) {
        unset(self::$script[$ref]);
        dbClass::deleteVarValue($ref);
    }

    public function getFunction($ref) {
        $key = substr($ref, 1);
       
        if (isset(self::$script[$key])) {
            return(self::$script[$key]);
        } else {
            return(dbClass::getFunctionValue($key));
        }
    }
}
