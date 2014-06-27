<?php

class Stack {

    /**
     * @var Stack El objeto que contiene la Pila
     */
    private $stack;

    /**
     * Constructor. Crea la pila
     *
     * @param void
     */
    public function __construct() {
        $this->stack = array();
    }

    /**/

    public function push($v) {
        $this->stack[] = $v;
    }

    /**/

    public function pop() {
        return array_pop($this->stack);
    }

    /**/

    public function isEmpty() {
        return empty($this->stack);
    }

    /**/

    public function length() {
        return count($this->stack);
    }

    /**/

    public function peek() {
        if (!$this->isEmpty()){
            return $this->stack[($this->length() - 1)];
        }       
    }

}
