<?php

abstract class Model{

    private PDO db;

    abstract function execRequest(string $sql, array $params = null) : PDOStatement|false
    
    
    
    private getDB() : PDO{
        
    }
}



?>