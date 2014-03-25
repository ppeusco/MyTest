<?php

use JsonScript;

include_once 'Class/addOperation.php';
include_once 'Class/printOperation.php';
include_once 'Class/OperationFactory.php';
include_once 'Class/CommandQueue.php';


function writeln($str) {
    echo $str . "</br>";
}
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //$obj1 = printOperation::getInstance();
        //$obj2 = addOperation::getInstance();
        //$obj1->execute(array(101));
        //writeln($obj2->execute(array(1, 10)));
        //$obj3 = OperationFactory::factory('add');
        //writeln($obj3->execute(array(10, 11)));
        //$obj4 = OperationFactory::factory('print');
        //$obj4->execute(array(25));
        //$commandQueue = new CommandQueue;

        /* $commandQueue->addCommand(OperationFactory::factory('add'),array(10, 11));
          $commandQueue->addCommand(OperationFactory::factory('print'),array(100));
          $commandQueue->addCommand(OperationFactory::factory('add'),array(2,5));
          $commandQueue->addCommand(OperationFactory::factory('print'),array(56));
          $commandQueue->addCommand(OperationFactory::factory('add'),array(5,6));
          $commandQueue->addCommand(OperationFactory::factory('print'),array(501)); */

        //$commandQueue->process();

        echo "Procesando script...." . "</br>";
        $script = file_get_contents("http://localhost/MyTest/sampleScript.txt");
        $scriptObj = new JsonScript($script);
        $scriptObj->processScript();
        ?>
    </body>
</html>
