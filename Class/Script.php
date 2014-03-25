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

}
