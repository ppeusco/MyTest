<?php

define('DB_NAME', 'test');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbClass
 *
 * @author ppeuscovich
 */
class dbClass {

    public static $db;

    public static function init() {
        if (self::$db === null) {
            try {
                // a new MongoDB connection
                $m = new Mongo();
                // connect to test database
                self::$db = $m->selectDb(DB_NAME);
                
            } catch (MongoConnectionException $e) {
                // if there was an error, we catch and display the problem here
                echo $e->getMessage();
            } catch (MongoException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public function update($collection,$elem) 
    {
        $collection->update(array('name' => $elem['name']),array('name' => $elem['name'],'value' => $elem['value']),array("upsert" => true));
    }
    
    public function insert($obj,$collectionType) {
        $collection = ($collectionType) ? self::$db->functions : self::$db->vars ;
        self::update($collection,$obj);    
    } 
    
    public function getVarValue($value) {
        $result = self::$db->vars->findOne(array('name' => $value));  
        if ($result) {
            return ($result['value']);                                 
        } else {
            return ("Undefined");
        }
    }  
    
    public function getFunctionValue($value) {
        $result = self::$db->functions->findOne(array('name' => $value));  
        if ($result) {
            return ($result['value']);                                 
        } else {
            return ("Undefined");
        }
    }  
    
    public function deleteVarValue($value) {
        self::$db->vars->remove(array('name' => $value));
    }
    
}
