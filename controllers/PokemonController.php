<?php

require_once('views/View.php');
require_once('models/PokemonManager.php');

 
class PokemonController{
    private $pokemonManager;
    private $typeManager;

    public function __construct() {
        $this->pokemonManager = new PokemonManager();
        $this->typeManager = new PkmntypeManager();
    }




    //affiche le formulaire d ajout de pokemon
    public function displayAddPokemon(?string $message = null ) :void{
        $indexView = new View('AddPokemon');
        $indexView->generer(['message' => $message,'types' =>$this->typeManager->getAll()]);


    }



    //affiche le formulaire d ajout de type de pokemon
    public function displayAddType(?string $message = null) :void{
        $indexView = new View('AddType');
        $indexView->generer(['message' => $message]);


    }


    //affiche le formulaire de recherche
    public function displaySearch( $message = null) :void{
        $indexView = new View('Search');
        $indexView->generer(['message'=>$message, 'types'=>$this->typeManager->getAll()]);


    }


    //ajoute un nouveau type avec les données en parametres
    public function addPkmnType(array $data)
    {
        $t= new PkmnType($data);
        $insert = $this->typeManager->createPkmnType($t);

        if($insert)$message = 'insertion du type réussie';
        else $message = 'insertion du type a échoué';
        $indexView = new View('Index');
        $all = $this->pokemonManager->getAll();
        $indexView->generer(['nomDresseur' => "Robin", 'all'=>$all,'message'=>$message]);
    }
    
//ajoute un pokemon avec les données en parametre et affiche la page principale avec le message de reussite ou d echec
    public function addPokemon(array $data){
        $p = new Pokemon();
        $p->setNomEspece($data['nomEspece']) ;
        $p->setTypeOne($data['typeOne']) ;
        $p->setTypeTwo($data['typeTwo']) ;
        $p->setDescription($data['description']) ;
        $p->setUrlImg($data['urlImg']) ;
        $insert = $this->pokemonManager->createPokemon($p);
        
        if($insert['res']) $message = 'insertion réussie';
        else $message = 'insertion a échoué';
        $p->setIdPokemon($insert['id']);
        $indexView = new View('Index');
        $all = $this->pokemonManager->getAll();
        $indexView->generer(['nomDresseur' => "Robin", 'all'=>$all,'message'=>$message]);
        return $p;

    }


    public function deletePokemonAndIndex(?int $idPokemon = null){
        $res = $this->pokemonManager->deletePokemonAndIndex($idPokemon);
        if($res) $message = "suppression réussi";
        else $message = "suppression échouée";
        $indexView = new View('Index');
        $all = $this->pokemonManager->getAll();
        $indexView->generer(['nomDresseur' => "Robin", 'all'=>$all,'message'=>$message]);
    }



    public function displayEditPokemon(?int $idPokemon = null, $message = null)
    {

        $pokemon = $this->pokemonManager->getByID($idPokemon);
        $editPokemon =  new View('AddPokemon');
        $editPokemon->generer(['pokemon' => $pokemon,'message'=>$message,'types' =>$this->typeManager->getAll()]);


    }


    public function editPokemonAndIndex(array $dataPokemon){

        /*
        $p = new Pokemon();
        $p->setIdPokemon($data['idPokemon']);
        $p->setNomEspece($data['nomEspece']) ;
        $p->setTypeOne($data['typeOne']) ;
        $p->setTypeTwo($data['typeTwo']) ;
        $p->setDescription($data['description']) ;
        $p->setUrlImg($data['urlImg']) ;
        */

        $res = $this->pokemonManager->editPokemonAndIndex($dataPokemon);
        if($res) $message = "modifiaction réussi";
        else $message = "modifiaction échouée";
        $indexView = new View('Index');
        $all = $this->pokemonManager->getAll();
        $indexView->generer(['nomDresseur' => "Robin", 'all'=>$all,'message'=>$message]);

    }


    public function search(array $paramsResearch)
    {
        $resultResearch = $this->pokemonManager->search($paramsResearch);
        if(!empty($resultResearch)){

            $message = "recherche réussi";
            $indexView = new View('Index');
            $indexView->generer(['nomDresseur' => "Robin", 'all'=>$resultResearch,'message'=>$message]);
        }
        else{
            $message = "la recherche n a pas abouti";
            $this->displaySearch($message);

        } 
        
        

    }

 
} 
 

?>