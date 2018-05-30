<?php
class PDOConnection
{
    static $_instance;
    private $hote;
    private $bd;
    private $charset;
    private $user;
    private $password;
    
    
    public function __construct($hote, $bd, $charset, $user, $password){
        $this->hote=$hote;
        $this->bd= $bd;
        $this->charset=$charset;
        $this->user=$user;
        $this->password=$password;
    }
    
    
    public static function getInstance() {
        if (!isset(self::$_instance))
            self::$_instance = new PDO('mysql:host=mysqlserverexemple.mysql.database.azure.com;dbname=ateliernfa021', 'talem.bdd@mysqlserverexemple', 'Myoujd@88');
            
            return self::$_instance;
    }
    
    
}
