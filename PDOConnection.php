<?php
class PDOConnection
{
    static $_instance;
    
    
    public static function getInstance() {
        if (!isset(self::$_instance))
            self::$_instance = new PDO('mysql:host=monservbdd.mysql.database.azure.com;dbname=ateliernfa021', 'talem.bdd@monservbdd', 'Cnam2018@');
            
            return self::$_instance;
    }
    
    
}
