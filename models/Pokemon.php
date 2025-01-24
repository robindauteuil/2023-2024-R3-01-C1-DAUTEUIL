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


    //creer le pokemon initialise les attributs
    public function __construct(){
        $typeManager = new pkmnTypeManager();
        $this->typeTwo = null;
    }



    // Récupère l'ID du Pokémon
    public function getIdPokemon(): ?int {
        return $this->idPokemon;
    }


    // Définit l'ID du Pokémon
    public function setIdPokemon(?int $idPokemon): void {
        $this->idPokemon = $idPokemon;
    }


    // Récupère le nom de l'espèce du Pokémon
    public function getNomEspece(): string {
        return $this->nomEspece;
    }


    // Définit le nom de l'espèce du Pokémon
    public function setNomEspece(string $nomEspece): void {
        $this->nomEspece = $nomEspece;
    }

    // Récupère la description du Pokémon
    public function getDescription(): ?string {
        return $this->description;
    }

    // Définit la description du Pokémon
    public function setDescription(?string $description): void {
        $this->description = $description;
    }


    // Récupère le premier type du Pokémon
    public function getTypeOne(): PkmnType {
        return $this->typeOne;
    }


    //Définit le premier type du Pokémo
    // Accepte soit un objet PkmnType, soit un identifiant de type (int)
    public function setTypeOne(PkmnType|int $typeOne): void {
        if ($typeOne instanceof PkmnType) {
            $this->typeOne = $typeOne;
        } elseif (is_int($typeOne)) {
            // Récupérer l'objet PkmnType à partir de l'identifiant
            $this->typeManager = new PkmnTypeManager();
            $this->typeOne = $this->typeManager->getById($typeOne);
        }
    }


    // Récupère le deuxième type du Pokémon
    public function getTypeTwo(): ?PkmnType {
        
        return $this->typeTwo;
    }


    // Définit le deuxième type du Pokémon
    // Fonctionne de la même manière que setTypeOne
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


    // Récupère l'URL de l'image du Pokémon
    public function getUrlImg(): ?string {
        return $this->urlImg;
    }


    // Définit l'URL de l'image du Pokémon
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



    // Convertit l'objet Pokémon en tableau
    // Utilisé pour faciliter les opérations de base de données
    public function toArray() {
        $proprietesArray = [];
        foreach ($this->getProprietes() as $propriete) {
            if(isset($this->$propriete)) $proprietesArray[$propriete] = $this->$propriete;
        }
        return $proprietesArray;
    }
}



?>