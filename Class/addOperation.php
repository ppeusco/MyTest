<?php
include_once 'Class/Operation.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addOperation
 *
 * @author ppeuscovich
 */
class addOperation extends Operation {
    public function execute($args)
    {
        return ($args[0] + $args[1]);
    }
}
