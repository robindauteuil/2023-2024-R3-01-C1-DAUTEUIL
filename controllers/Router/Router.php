<?php
include('Route.php');
include('Route/RouteIndex.php');
include_once('Route/RouteAddPokemon.php');
include_once('Route/RouteAddType.php');
include_once('Route/RouteSearch.php');

class Router{

    private Array $routeList = [];
    private Array  $ctrlList = [] ;



    public function __construct($name_of_action_key = "action"){

        //initialise la liste de controler
        $this->createControllerList ();

        //initialise la liste de route
        $this->createRouteList();
    }



    public function createControllerList(){
        $this->ctrlList["main"]=  new MainController();
        //$this->ctrlList["pokemon"]=  new PokemonController();


    }


    public function createRouteList(){

        $this->routeList["index"]=  new RouteIndex( $this->ctrlList["main"]);
        $this->routeList["del-pokemon"]=  new RouteIndex( $this->ctrlList["main"]);
        $this->routeList["add-pokemon"]=  new RouteAddPokemon( $this->ctrlList["main"]);
        $this->routeList["add-pokemon-type"]=  new RouteAddType( $this->ctrlList["main"]);
        $this->routeList["search"]=  new RouteSearch( $this->ctrlList["main"]);
    }


    public function routing($get,$post){

        if($get != null)
        {
            if($post != null){
                $this->routeList[$get]->action($post);
            }
            else $this->routeList[$get]->action(); 
        }  
        
    }
    
}


?>