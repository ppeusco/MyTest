<?php

/**
 * Description of printOperation
 *
 * @author ppeuscovich
 */
class deleteOperation extends Operation {
    public function execute($args) {
        Script::deleteValue($args['id']);
    }
}
