<?php

/**
 * Description of printOperation
 *
 * @author ppeuscovich
 */


class printOperation extends Operation {
    public function execute($args) {
        echo parent::getParamValue($args['value']).PHP_EOL;
    }
}
