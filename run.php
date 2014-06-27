<?php

function __autoload($className) {
      if (file_exists('Class/'. $className . '.php')) {
          require_once 'Class/'. $className . '.php';
          return true;
      }
      return false;
} 


function writeln($msg) {
    echo $msg . PHP_EOL;
}

function array_kshift(&$arr) {
    list($k) = array_keys($arr);
    $r = array($k => $arr[$k]);
    unset($arr[$k]);
    return $r;
}

$command = array_kshift($argv);

foreach ($argv as $file) {
    writeln("Processing: " . $file);
    $script = file_get_contents($file);
    $scriptObj = new ScriptManager($script);
    $scriptObj->processScript();
} 