<?php

//include('../Route.php');
abstract class Route{
 
 
    
    

 
        


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



  
class RouteIndex extends Route{

    private MainController $controler;

    public function __construct(MainController $controller) {
        //parent::__construct();
        $this->controler = $controller;
    }
  

    public function get($params = []){
        $this->controler->index();
       
    }


    public function post($params = []){
        $this->controler->index();
    }





}








?>