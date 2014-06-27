
<?php

class OperationFactory
{
    // Método Factory parametrizado
    public static function factory($type)
    {
        if (include_once 'Class/' . $type . 'Operation.php') {
            $classname =  $type. 'Operation' ;
            return  $classname::getInstance();
        } else {
            throw new Exception ('Class not exist');
        }
    }
}
?>
