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
        
        $pika = $this->pokemonManager->getByID(1);
        $indexView = new View('Index');
        $indexView->generer(['nomDresseur' => "Robin", 'pika' =>$pika->getNomEspece(), 'all'=>$all]);
        
        
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
        $this->pokemonManager->createPokemon($data);

    }
} 
 

?>