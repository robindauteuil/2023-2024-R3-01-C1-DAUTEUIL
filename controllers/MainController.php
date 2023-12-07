<?php

require_once('views/View.php');
require_once('models/PokemonManager.php');

 
class MainController{
    private $pokemonManager;

    public function __construct() {
        $this->pokemonManager = new PokemonManager();
    }
    public function Index() : void {
        

        $all = $this->pokemonManager->getAll();
        
        //$pika = $this->pokemonManager->getByID(1);
        $indexView = new View('Index');
        $indexView->generer(['nomDresseur' => "Robin", 'all'=>$all]);
        
        
    }



    public function displayAddPokemon(?string $message = null ) :void{
        $indexView = new View('AddPokemon');
        $indexView->generer(['message' => $message]);


    }


    public function displayAddType() :void{
        $indexView = new View('AddType');
        $indexView->generer([]);


    }

    public function displaySearch() :void{
        $indexView = new View('Search');
        $indexView->generer([]);


    }
    

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
        $editPokemon->generer(['pokemon' => $pokemon,'message'=>$message]);


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

} 
 

?>