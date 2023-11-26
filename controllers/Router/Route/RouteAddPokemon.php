<?php

//include_once('../Route.php');
abstract class Route3{
 
 
    //protected $controller;

    //public function __construct(MainController $controller) {
      //  $this->controller = $controller;}


    public function action($params = [], $method = 'GET'){
        if($method == 'GET') $this->get($params);
    }

    abstract protected function get($params = []);

    abstract protected function post($params = []);




    protected function getParam(array $array, string $paramName, bool $canBeEmpty=true)
    {
        if (isset($array[$paramName])) {
            if(!$canBeEmpty && empty($array[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $array[$paramName];
        } else
            throw new Exception("Paramètre '$paramName' absent");
    }

}

class RouteAddPokemon extends Route3{

    private MainController $controler;

    public function __construct(MainController $controller) {
        //parent::__construct($controller);
        $this->controler = $controller;
    } 


    public function get($params = []){
        $this->controler->displayAddPokemon();
    }


    public function post($params = []){
        $this->controler->index();
    }

}





?>