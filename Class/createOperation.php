<?php

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
class createOperation extends Operation {
    public function execute($args) {
       Script::setValue($args['id'],$args['value']);
    }
}