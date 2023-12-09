<?php





class RouteSearch extends Route{

 private PokemonController $controler;

 public function __construct(PokemonController $controller) {
     //parent::__construct($controller);
     $this->controler = $controller;
 } 


 public function get($params = []){
     $this->controler->displaySearch();
 }


 public function post($params = []){
     $this->controler->index();
 }

}





?>