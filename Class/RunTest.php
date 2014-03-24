<?php
include_once 'Class/JsonScript.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of runTest
 *
 * @author pablo
 */
class runTest {
    public $scriptObj;
    
    public function __construct($script){
        $this->scriptObj = new JsonScript($script);
        $this->scriptObj->processScript();
    }
}
