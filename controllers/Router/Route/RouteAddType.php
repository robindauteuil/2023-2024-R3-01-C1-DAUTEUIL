<?php

abstract class Route4{
 
 
    //protected $controller;

    //public function __construct(MainController $controller) {
      //  $this->controller = $controller;} 


    public function action($params = [], $method = 'GET'){
        if($method == 'GET') $this->get($params);
        else $this->post($params);
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

class RouteAddType extends Route4{

    private MainController $controler;

    public function __construct(MainController $controller) {
        //parent::__construct($controller);
        $this->controler = $controller;
    } 


    public function get($params = []){
        $this->controler->displayAddType();
    }


    public function post($params = []){

        try {
            // Récupérer les valeurs nécessaires avec getParam
            $data["nomType"] = parent::getParam($params, "nomType", false);
            $data["urlImg"] = parent::getParam($params, "urlImg", false);


            // Appeler la méthode du contrôleur avec les données
            $this->controler->addPkmnType($data);
        } catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controler->displayAddType($e->getMessage());
        }
        
    }

}





?>