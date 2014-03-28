<?php

class Script {

    public static $script;
    
    public static function init($script) {
        self::$script = $script;
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
        return isset(self::$script[$key]) ? self::$script[$key] : "Undefined";
    }
    
    public function setValue($var, $ref) {
        self::$script[$var] = $ref;
    }
    
    public function deleteValue($ref) {
        unset(self::$script[$ref]);
    }
    
    

}
