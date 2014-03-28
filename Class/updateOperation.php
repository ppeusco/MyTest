<?php

include_once 'Class/Operation.php';
include_once 'Class/Script.php';

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
class updateOperation extends Operation {
    public function execute($args) {
        Script::setValue($args[0]['id'], $args[0]['value']);
    }
}
