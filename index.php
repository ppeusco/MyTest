<?php
include_once 'Class/addOperation.php';
include_once 'Class/printOperation.php';
include_once 'Class/OperationFactory.php';

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
        
        $obj1 = printOperation::getInstance();
        $obj2 = addOperation::getInstance();
        $obj1->execute(array(101));
        writeln($obj2->execute(array(1, 10)));
        $obj3 = OperationFactory::factory('add');
        writeln($obj3->execute(array(10, 11)));
        $obj4 = OperationFactory::factory('print');
        $obj4->execute(array(25));
        
        
        $values = array(25, 100, 57);
        $commandQueue = new CommandQueue;
        
        foreach ($values as $key => $value) {
            $obj = OperationFactory::factory($value);
        }
        
        
        
        $commandQueue->process();
        
        
        
        
        ?>
    </body>
</html>
