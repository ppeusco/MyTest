<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of errorClass
 *
 * @author ppeuscovich
 */
class errorClass {
    public static $error= array();
    
    public static function  init() {
        self::$error = array();
    }
    
    public function addError($msg) {
        self::$error[] = $msg;
    }
    
    public function fetchAllErrors() {
        $result = self::$error;
        foreach ($result as $error) {
            echo $error. PHP_EOL;
        }
    }
}
