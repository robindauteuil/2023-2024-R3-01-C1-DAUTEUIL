<?php

class PkmnType{


    private ?int $idType;
    private string $nomType;
    private string $urlImg;



    //retourne l'Id du type
    public function getIdType() : int{
        return $this->idType;
    }


     //retourne le nom du type
    public function getNomType() : string{
        return $this->nomType;
    }


    //retourne l'url de l image du type
    public function getUrlImg() : string{
        return $urlImg;
    }



    // crée un PkmnType et initialise les attributs avec le tableau passé en parametre
    public function __construct(array $data){
        
        if(isset($data['idType']))$this->idType = $data['idType'];
        $this->nomType = $data['nomType'];
        $this->urlImg = $data['urlImg'];
        
    }


    //initialise les attributs avec le tableau passé en parametre
    public function hydrate(array $data){
        if(isset($data['idType']))$this->idType = $data['idType'];
        $this->nomType = $data['nomType'];
        $this->urlImg = $data['urlImg'];

    }




    // Méthode pour obtenir la liste des propriétés
    public static function getProprietes()
    {
        $reflect = new ReflectionClass('PkmnType');
        $proprietes = [];
        foreach ($reflect->getProperties(ReflectionProperty::IS_PRIVATE) as $prop) {
            $proprietes[] = $prop->getName();
        }
        return $proprietes;
    }



    //retourne un tableau dont la clée est le nom de la propriete et la valeur est la valeur de la propriete du pkmntype
    public function toArray() {
        $proprietesArray = [];
        foreach ($this->getProprietes() as $propriete) {
            if(isset($this->$propriete)) 
            $proprietesArray[$propriete] = $this->$propriete;
        }
        return $proprietesArray;
    }

}




?>