<?php

include_once 'Class/Operation.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of printOperation
 *
 * @author ppeuscovich
 */
class printOperation extends Operation {

    public function execute($args) {
        echo $args[0] . "</br>";
    }
}
