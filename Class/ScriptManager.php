<?php

/**
 * Description of JsonScript
 *
 * @author pablo
 */
class ScriptManager {

    protected $commandQueue;
    protected $params;
    protected $stack;

    public function __construct($json) {
        Script::init(json_decode($json, true));
    }

    public function processScript() {
        $script = Script::getScript();
        $this->updateDB($script);

        if (isset($script['init'])) {
            $this->processInit($script['init']);
        }
    }

    public function updateDB($script) {
        foreach ($script as $key => $value) {
            $element = array('name' => $key, 'value' => $value);
            dbClass::insert($element, is_array($value));
        }
    }

    public function processInit($script) {
        $this->commandQueue = new CommandQueue;
        $this->stack = new Stack;
        $this->parse($script);
        $this->commandQueue->process();
        errorClass::fetchAllErrors();
    }

    public function parse($block) {
        $newBlock = NULL;
        foreach ($block as $key => $command) {
            if ($this->isFunction($command['cmd'])) {
                $newBlock = Script::getFunction($command['cmd']);
                if ($newBlock !== "Undefined") {
                    $this->stack->push($command);
                    $this->parse($newBlock);
                } else {
                    echo "Undefined function" . PHP_EOL;
                }
            } else {
                $params = $this->stack->peek();
                $result = $this->changeParams($command, $params);
                $this->commandQueue->addCommand(OperationFactory::factory($command['cmd']), $result);
                $this->stack->pop();
            }
        }
    }

    public function isFunction($name) {
        if ($name[0] == "#") {
            return true;
        } else {
            return false;
        }
    }

    private function changeParams($command, $params) {
        $result = array();
        foreach ($command as $key => $value) {
            if ($value[0] === '$') {
                $result[$key] = $params[substr($value, 1)];
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

}
