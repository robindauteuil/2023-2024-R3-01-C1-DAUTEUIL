<?php

require_once('views/View.php');
require_once('models/PokemonManager.php');

 
class MainController{

    public function Index() : void {
        $pokemonManager = new PokemonManager();

        $all = $pokemonManager->getAll();
        
        $pika = $pokemonManager->getByID(1);
        $indexView = new View('Index');
        $indexView->generer(['nomDresseur' => "Robin", 'pika' =>$pika->getNomEspece(), 'all'=>$all]);
        
        
    }
 
}


?>