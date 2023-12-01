<?php


class Pokemon {
 
    private ?int $idPokemon;
    private string $nomEspece;
    private ?string $description;
    private string $typeOne;
    private ?string $typeTwo;
    private ?string $urlImg;


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

    public function getTypeOne(): string {
        return $this->typeOne;
    }

    public function setTypeOne(string $typeOne): void {
        $this->typeOne = $typeOne;
    }

    public function getTypeTwo(): ?string {
        return $this->typeTwo;
    }

    public function setTypeTwo(?string $typeTwo): void {
        $this->typeTwo = $typeTwo;
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