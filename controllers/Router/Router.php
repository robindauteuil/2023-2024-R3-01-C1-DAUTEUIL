<?php
include('Route.php');
include('Route/RouteIndex.php');
include_once('Route/RouteAddPokemon.php');
include_once('Route/RouteAddType.php');
include_once('Route/RouteSearch.php');
include_once('Route/RouteDelPokemon.php');
include_once('Route/RouteEditPokemon.php');
include_once('Route/RouteEditPokemon.php');


class Router{

    private Array $routeList = [];
    private Array  $ctrlList = [] ;



    public function __construct($name_of_action_key = "action"){

        //initialise la liste de controler
        $this->createControllerList ();

        //initialise la liste de route
        $this->createRouteList();
    }




    //cree la liste de controller
    public function createControllerList(){
        $this->ctrlList["main"]=  new MainController();
        $this->ctrlList["pokemon"]=  new PokemonController();


    }



    //cree la liste de route
    public function createRouteList(){

        $this->routeList["index"]=  new RouteIndex( $this->ctrlList["main"]);
        $this->routeList["del-Pokemon"]=  new RouteDelPokemon( $this->ctrlList["pokemon"]);
        $this->routeList["add-pokemon"]=  new RouteAddPokemon( $this->ctrlList["pokemon"]);
        $this->routeList["add-pokemon-type"]=  new RouteAddType( $this->ctrlList["pokemon"]);
        $this->routeList["search"]=  new RouteSearch( $this->ctrlList["pokemon"]);
        $this->routeList["edit-Pokemon"]=  new RouteEditPokemon( $this->ctrlList["pokemon"]);
    }


    //appelle la bonne route en fonction des parametres 
    public function routing($get,$post){

        if($get != null)
        {
            if($post != null){
                
                $this->routeList[$get]->action($post,"POST");
            }
            else $this->routeList[$get]->action(); 
        }  
         
    }
    
}


?>