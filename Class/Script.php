<?php

class Script {

    public  static $script;

    public function __construct($json) {
        $this->script = json_decode($json, true);
    }

    public static function getScript() {
        return self::$script;
    }
    
    public static function setScript($script) {
        self::$script = $script;
    }

}
