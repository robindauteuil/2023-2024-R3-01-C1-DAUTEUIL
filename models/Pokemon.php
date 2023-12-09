<?php

include("PkmnTypeManager.php");


class Pokemon {
 
    private ?int $idPokemon;
    private string $nomEspece;
    private ?string $description;
    private ?PkmnType $typeOne;
    private ?PkmnType $typeTwo;
    private ?string $urlImg;
    private PkmnTypeManager $typeManager;


    public function __construct(){
        $typeManager = new pkmnTypeManager();
        $this->typeTwo = null;
    }


    public function getIdPokemon(): ?int {
        return $this->idPokemon;
    }

    public function setIdPokemon(?int $idPokemon): void {
        $this->idPokemon = $idPokemon;
    }

    public function getNomEspece(): string {
        return $this->nomEspece;
    }

    public function setNomEspece(string $nomEspece): void {
        $this->nomEspece = $nomEspece;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    public function getTypeOne(): PkmnType {
        return $this->typeOne;
    }

    public function setTypeOne(PkmnType|int $typeOne): void {
        if ($typeOne instanceof PkmnType) {
            $this->typeOne = $typeOne;
        } elseif (is_int($typeOne)) {
            // Récupérer l'objet PkmnType à partir de l'identifiant
            $this->typeManager = new PkmnTypeManager();
            $this->typeOne = $this->typeManager->getById($typeOne);
        }
    }

    public function getTypeTwo(): ?PkmnType {
        
        return $this->typeTwo;
    }

    public function setTypeTwo(PkmnType|int $typeTwo): void {
        if(isset($typeTwo)){
            if ($typeTwo instanceof PkmnType) {
                $this->typeTwo = $typeTwo;
            } elseif (is_int($typeTwo)) {
                // Récupérer l'objet PkmnType à partir de l'identifiant
                
                $this->typeTwo = $this->typeManager->getById($typeTwo);
            }

        }

    }

    public function getUrlImg(): ?string {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): void {
        $this->urlImg = $urlImg;
    }


    // Méthode pour obtenir la liste des propriétés
    public static function getProprietes()
    {
        $reflect = new ReflectionClass('Pokemon');
        $proprietes = [];
        foreach ($reflect->getProperties(ReflectionProperty::IS_PRIVATE) as $prop) {
            $proprietes[] = $prop->getName();
        }
        return $proprietes;
    }


    public function toArray() {
        $proprietesArray = [];
        foreach ($this->getProprietes() as $propriete) {
            if(isset($this->$propriete)) $proprietesArray[$propriete] = $this->$propriete;
        }
        return $proprietesArray;
    }
}



?>