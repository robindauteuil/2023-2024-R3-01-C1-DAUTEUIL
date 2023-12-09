<?php

class PkmnType{


    private ?int $idType;
    private string $nomType;
    private string $urlImg;

    public function getIdType() : int{
        return $this->idType;
    }

    public function getNomType() : string{
        return $this->nomType;
    }

    public function getUrlImg() : string{
        return $urlImg;
    }

    public function __construct(array $data){
        
        if(isset($data['idType']))$this->idType = $data['idType'];
        $this->nomType = $data['nomType'];
        $this->urlImg = $data['urlImg'];
        
    }


    public function hydrate(array $data){
        $idType = $data[0];
        $nom = $data[1];
        $urlImg = $data[2];

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