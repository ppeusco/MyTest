<?php

/**
 * Description of printOperation
 *
 * @author ppeuscovich
 */
class updateOperation extends Operation {
    public function execute($args) {
        Script::setValue($args['id'], $args['value']);
    }
}
