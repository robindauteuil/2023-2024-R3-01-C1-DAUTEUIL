<?php


 
abstract class Model{

    private PDO $db;

    public function __construct(){
        
    }

    function execRequest(string $sql, array $params = null) : PDOStatement|false{

        if ($params){
            $req = $this->db->prepare($sql);
            foreach ($params as $propriete => $valeur) {
                $req->bindValue(":$propriete", $valeur, PDO::PARAM_STR);
            }
            $result = $req->execute();
        }
        else{
            $req = $this->db->prepare($sql);
            $result = $req->execute();

        }
        
        return $result ? $req : false; 

    }
    
    
    
    public function getDB() : PDO{



        $this->db = new PDO('mysql:host=localhost;dbname=grp-433_S3_progweb', 'grp-433', 'i6nQhpSp', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $this->db ;
        
    }
}



?>