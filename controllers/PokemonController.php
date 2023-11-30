<?php

require_once('views/View.php');
require_once('models/PokemonManager.php');

 
class PokemonController{



    public function displayAddPokemon() :void{
        $indexView = new View('AddPokemon');
        $indexView->generer([]);


    }


    public function displayAddType() :void{
        $indexView = new View('AddType');
        $indexView->generer([]);


    }
 
} 
 

?>